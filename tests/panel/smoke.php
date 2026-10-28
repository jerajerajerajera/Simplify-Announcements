<?php

// Loads Simplify Announcements inside a real Pelican panel and opens its pages. Run from the panel folder after
// `php artisan p:plugin:install simplify-announcements`: php plugins/simplify-announcements/tests/panel/smoke.php
use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;
use Livewire\Livewire;
use Simplify\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;
use Simplify\Announcements\Livewire\AnnouncementBars;
use Simplify\Announcements\Models\Announcement;

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
function expect(bool $ok, string $what): void
{
    if (! $ok) {
        throw new RuntimeException($what);
    }
}

$admin = User::where('email', 'smoke-announcements@example.com')->first()
    ?? User::factory()->create(['email' => 'smoke-announcements@example.com', 'root_admin' => true]);
$player = User::where('email', 'smoke-player@example.com')->first()
    ?? User::factory()->create(['email' => 'smoke-player@example.com', 'root_admin' => false]);
Announcement::query()->delete();

step('admin page renders', function () use ($admin) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    expectOk(visit($admin, $url), $url);
});
step('a player cannot open the admin page', function () use ($player) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    expect(! str_contains((string) visit($player, $url)->getContent(), 'No announcements yet'), 'the page opened for a player');
});

$live = Announcement::create(['category' => 'warning', 'title' => 'Smoke maintenance tonight', 'body' => 'Back at nine.', 'ends_at' => now()->addHour(), 'button_url' => '/']);
Announcement::create(['title' => 'Smoke for admins', 'audience' => 'admins']);
Announcement::create(['title' => 'Smoke later', 'starts_at' => now()->addDay()]);
Announcement::create(['title' => 'Smoke ended', 'ends_at' => now()->subMinute()]);

step('live announcements show as bars on the dashboard', function () use ($admin, $player) {
    $page = expectOk(visit($player, url('/')), '/');
    expect(str_contains($page, 'Smoke maintenance tonight'), 'the live bar is missing');
    expect(! str_contains($page, 'Smoke for admins'), 'a player sees an admins-only bar');
    expect(! str_contains($page, 'Smoke later') && ! str_contains($page, 'Smoke ended'), 'a bar outside its times shows');
    expect(str_contains(expectOk(visit($admin, url('/')), '/'), 'Smoke for admins'), 'an admin misses the admins-only bar');
});
step('the admin list shows every announcement', function () use ($admin) {
    $url = AnnouncementResource::getUrl(panel: 'admin');
    $page = expectOk(visit($admin, $url), $url);
    foreach (['Smoke maintenance tonight', 'Smoke later', 'Smoke ended'] as $title) {
        expect(str_contains($page, $title), "$title is missing");
    }
});
step('unpin moves a bar to the bell and pin brings it back', function () use ($player, $live) {
    Auth::setUser($player);
    Livewire::test(AnnouncementBars::class)->call('unpin', $live->id);
    expect($live->dismissedBy()->whereKey($player->id)->exists(), 'not unpinned');
    expect(Announcement::barsFor($player)->whereKey($live->id)->doesntExist(), 'the bar still shows');
    $notification = $player->notifications()->where('data->viewData->simplify_announcement', $live->id)->first();
    expect($notification !== null, 'nothing in the bell');
    expect(($notification->data['actions'][0]['event'] ?? null) === AnnouncementBars::PIN_EVENT, 'the bell has no pin button');

    Livewire::test(AnnouncementBars::class)->call('pin', $live->id);
    expect(Announcement::barsFor($player)->whereKey($live->id)->exists(), 'the bar did not come back');
    expect($player->notifications()->where('data->viewData->simplify_announcement', $live->id)->doesntExist(), 'the bell item stayed');
});

Announcement::query()->where('title', 'like', 'Smoke%')->delete();
exit($failed ? 1 : 0);
