<?php

declare(strict_types=1);

namespace Simplify\Announcements\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Simplify\Announcements\AnnouncementsAddon;
use Simplify\Announcements\Livewire\AnnouncementBars;
use Simplify\Announcements\Models\Announcement;
use Simplify\Announcements\Policies\AnnouncementPolicy;

final class AnnouncementsProvider extends ServiceProvider
{
    public function register(): void
    {
        // Shows the add-on in Simplify when Simplify is installed. Without Simplify the class is never loaded.
        $this->app->tag([AnnouncementsAddon::class], 'simplify.addons');
    }

    public function boot(): void
    {
        Gate::policy(Announcement::class, AnnouncementPolicy::class);
        Livewire::component('simplify-announcements-bars', AnnouncementBars::class);
        $this->app->booted(function (): void {
            Schedule::command('simplify-announcements:deliver')->everyMinute()->withoutOverlapping(10);
        });
    }
}
