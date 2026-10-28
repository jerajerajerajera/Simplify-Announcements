<?php

// Loads Simplify Announcements inside a real Pelican panel and opens its pages. Run from the panel folder after
// `php artisan p:plugin:install simplify-announcements`: php plugins/simplify-announcements/tests/panel/smoke.php
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Testing\TestResponse;
use Livewire\Livewire;
use Simplify\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;
use Simplify\Announcements\Livewire\AnnouncementBars;
use Simplify\Announcements\Models\Announcement;
use Simplify\Announcements\Services\Bell;
use Simplify\Announcements\Services\Push;

define('LARAVEL_START', microtime(true));
require getcwd().'/vendor/autoload.php';
$app = require getcwd().'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$failed = false;
function step(string $what, callable $run): void
{
    global $failed;
    try {
        $run();
        echo "PASS $what\n";
    } catch (Throwable $e) {
        $failed = true;
        echo "FAIL $what: ".get_class($e).': '.substr($e->getMessage(), 0, 400).' ('.basename($e->getFile()).':'.$e->getLine().")\n";
    }
}
function visit(User $user, string $url): TestResponse
{
    $client = new class(app())
    {
        use InteractsWithAuthentication, InteractsWithSession, MakesHttpRequests;

        public function __construct(public $app) {}
    };

    return $client->actingAs($user)->followingRedirects()->get($url);
}
function expectOk(TestResponse $response, string $url): string
{
    if ($response->getStatusCode() !== 200) {
        throw new RuntimeException('HTTP '.$response->getStatusCode().' at '.$url.($response->exception ? ': '.$response->exception->getMessage() : ''));
    }

    return (string) $response->getContent();
}
function ensure(bool $ok, string $what): void
{
    if (! $ok) {
        throw new RuntimeException($what);
    }
}

// Laravel's handler would print an uncaught error and still exit with 0, so every failure outside a step is caught here.
set_exception_handler(function (Throwable $e): void {
    echo 'FAIL setup: '.get_class($e).': '.substr($e->getMessage(), 0, 400)."\n";
    exit(1);
});
$admin = User::where('email', 'smoke-announcements@example.com')->first()
    ?? User::factory()->create(['email' => 'smoke-announcements@example.com']);
$admin->syncRoles(Role::getRootAdmin());
$player = User::where('email', 'smoke-player@example.com')->first()
    ?? User::factory()->create(['email' => 'smoke-player@example.com']);
ensure($admin->isRootAdmin() && ! $player->isAdmin(), 'the smoke accounts do not have the right roles');
Announcement::query()->delete();

// Pages of the app panel first: in one process, a page of another panel leaves its render hooks behind.
$live = Announcement::create(['category' => 'warning', 'title' => 'Smoke maintenance tonight', 'body' => 'Back at nine.', 'ends_at' => now()->addHour(), 'button_url' => '/']);
Announcement::create(['title' => 'Smoke for admins', 'audience' => 'admins']);
Announcement::create(['title' => 'Smoke later', 'starts_at' => now()->addDay()]);
Announcement::create(['title' => 'Smoke ended', 'ends_at' => now()->subMinute()]);

step('live announcements show as bars on the dashboard', function () use ($admin, $player) {
    $page = expectOk(visit($player, url('/')), '/');
    ensure(str_contains($page, 'Smoke maintenance tonight'), 'the live bar is missing');
    ensure(! str_contains($page, 'Smoke for admins'), 'a player sees an admins-only bar');
    ensure(! str_contains($page, 'Smoke later') && ! str_contains($page, 'Smoke ended'), 'a bar outside its times shows');
    ensure(str_contains(expectOk(visit($admin, url('/')), '/'), 'Smoke for admins'), 'an admin misses the admins-only bar');
});
step('admin page renders', function () use ($admin) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    expectOk(visit($admin, $url), $url);
});
step('a player cannot open the admin page', function () use ($player) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    ensure(! str_contains((string) visit($player, $url)->getContent(), 'Smoke maintenance tonight'), 'the page opened for a player');
});

step('the admin list shows every announcement', function () use ($admin) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    $page = expectOk(visit($admin, $url), $url);
    foreach (['Smoke maintenance tonight', 'Smoke later', 'Smoke ended'] as $title) {
        ensure(str_contains($page, $title), "$title is missing");
    }
});
step('unpin moves a bar to the bell and pin brings it back', function () use ($player, $live) {
    Auth::setUser($player);
    Livewire::test(AnnouncementBars::class)->call('unpin', $live->id);
    ensure($live->dismissedBy()->whereKey($player->id)->exists(), 'not unpinned');
    ensure(Announcement::barsFor($player)->whereKey($live->id)->doesntExist(), 'the bar still shows');
    $notification = $player->notifications()->where('data->viewData->simplify_announcement', $live->id)->first();
    ensure($notification !== null, 'nothing in the bell');
    ensure(($notification->data['actions'][0]['event'] ?? null) === AnnouncementBars::PIN_EVENT, 'the bell has no pin button');

    Livewire::test(AnnouncementBars::class)->call('pin', $live->id);
    ensure(Announcement::barsFor($player)->whereKey($live->id)->exists(), 'the bar did not come back');
    ensure($player->notifications()->where('data->viewData->simplify_announcement', $live->id)->doesntExist(), 'the bell item stayed');
});

step('"in everyone\'s notifications" reaches the bell once, for the right accounts', function () use ($admin, $player) {
    $everyone = Announcement::create(['title' => 'Smoke in the bell', 'in_bell' => true]);
    $admins = Announcement::create(['title' => 'Smoke bell for admins', 'in_bell' => true, 'audience' => 'admins']);
    $later = Announcement::create(['title' => 'Smoke bell later', 'in_bell' => true, 'starts_at' => now()->addHour()]);
    ensure(Artisan::call('simplify-announcements:deliver') === 0, 'the scheduler command failed');
    Artisan::call('simplify-announcements:deliver');
    ensure($player->notifications()->where('data->viewData->simplify_announcement', $everyone->id)->count() === 1, 'the player did not get it exactly once');
    ensure(Bell::has($admins->id, $admin) && ! Bell::has($admins->id, $player), 'admins-only reached the wrong accounts');
    ensure(! Bell::has($later->id, $player) && $later->fresh()->in_bell_at === null, 'a later one was sent early');

    Auth::setUser($player);
    Livewire::test(AnnouncementBars::class)->call('unpin', $everyone->id);
    ensure($player->notifications()->where('data->viewData->simplify_announcement', $everyone->id)->count() === 1, 'unpinning added a second bell item');

    $everyone->update(['ends_at' => now()]);
    ensure(! Bell::has($everyone->id, $player), 'an ended announcement stayed in the bell');
    $admins->delete();
    ensure(! Bell::has($admins->id, $admin), 'a deleted announcement stayed in the bell');
});

step('app notifications go through Simplify\'s push event, only while it listens', function () use ($admin, $player) {
    ensure(! Push::available() && Push::sendDue() === 0, 'push looks available without Simplify');
    $offered = [];
    Event::listen(Push::EVENT, function (array $payload) use (&$offered): int {
        $offered[] = $payload;

        return count($payload['users']);
    });
    $now = Announcement::create(['title' => 'Smoke push', 'push' => true, 'button_url' => '/']);
    $admins = Announcement::create(['title' => 'Smoke push for admins', 'push' => true, 'audience' => 'admins']);
    $old = Announcement::create(['title' => 'Smoke push old', 'push' => true, 'starts_at' => now()->subDays(2)]);
    Announcement::create(['title' => 'Smoke no push']);
    Artisan::call('simplify-announcements:deliver');

    $tags = array_column($offered, 'tag');
    ensure($tags === ['simplify-announcement-'.$now->id, 'simplify-announcement-'.$admins->id] || $tags === ['simplify-announcement-'.$admins->id, 'simplify-announcement-'.$now->id], 'offered the wrong announcements: '.json_encode($tags));
    $forAdmins = array_values(array_filter($offered, fn (array $p) => $p['tag'] === 'simplify-announcement-'.$admins->id))[0];
    ensure(in_array($admin->id, $forAdmins['users'], true) && ! in_array($player->id, $forAdmins['users'], true), 'admins-only went to the wrong accounts');
    ensure($now->fresh()->pushed_to === User::count() && $old->fresh()->pushed_to === 0, 'pushed_to is not added up');

    $url = AnnouncementResource::getUrl(panel: 'admin');
    ensure(str_contains(expectOk(visit($admin, $url), $url), 'Devices reached'), 'the list does not show the devices reached');
});

Announcement::query()->where('title', 'like', 'Smoke%')->delete();
if ($failed) {
    exit(1);
}
echo "All steps passed\n";
