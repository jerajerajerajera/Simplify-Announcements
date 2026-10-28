<?php

declare(strict_types=1);

namespace Simplify\Announcements\Livewire;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Simplify\Announcements\Models\Announcement;
use Simplify\Announcements\Support\Rules;

/**
 * The live announcements as bars at the top of every page. Each bar is pinned; unpinning it removes the bar for this
 * account and leaves it in the bell, with a button to pin it again.
 */
final class AnnouncementBars extends Component
{
    public const PIN_EVENT = 'simplify-announcements-pin';

    private const LIMIT = 5;

    public function render(): View
    {
        return view('simplify-announcements::bars', ['announcements' => $this->announcements()]);
    }

    public function unpin(int $id): void
    {
        $user = user();
        $announcement = $user ? Announcement::barsFor($user)->find($id) : null;
        if (! $user || ! $announcement) {
            return;
        }

        $announcement->dismissedBy()->syncWithoutDetaching([$user->id => ['created_at' => now()]]);
        $user->notifyNow(Notification::make()
            ->title($announcement->title)
            ->body($announcement->body)
            ->icon(Rules::icon($announcement->category))
            ->iconColor(Rules::color($announcement->category))
            ->viewData(['simplify_announcement' => $announcement->id])
            ->actions([
                Action::make('pin')
                    ->label(__('simplify-announcements::announcements.bars.pin_again'))
                    ->icon('tabler-pin')
                    ->button()
                    ->dispatch(self::PIN_EVENT, ['id' => $announcement->id])
                    ->close(),
            ])
            ->toDatabase());
        $this->dispatch('databaseNotificationsSent');
    }

    #[On(self::PIN_EVENT)]
    public function pin(int $id): void
    {
        $user = user();
        if (! $user) {
            return;
        }

        Announcement::query()->find($id)?->dismissedBy()->detach($user->id);
        $user->notifications()->where('data->viewData->simplify_announcement', $id)->delete();
        $this->dispatch('databaseNotificationsSent');
    }

    /** @return Collection<int, Announcement> */
    private function announcements(): Collection
    {
        $user = user();

        return $user ? Announcement::barsFor($user)->limit(self::LIMIT)->get() : collect();
    }
}
