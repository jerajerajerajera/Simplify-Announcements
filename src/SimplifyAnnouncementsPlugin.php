<?php

declare(strict_types=1);

namespace Simplify\Announcements;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Simplify\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;

final class SimplifyAnnouncementsPlugin implements Plugin
{
    public const ID = 'simplify-announcements';

    public function getId(): string
    {
        return self::ID;
    }

    public function register(Panel $panel): void
    {
        if ($panel->getId() === 'admin') {
            $panel->resources([AnnouncementResource::class]);

            return;
        }

        // The bars sit where Pelican shows its own alert banners, on every page of the panel.
        $panel->renderHook(
            PanelsRenderHook::PAGE_START,
            fn (): string => Blade::render("@livewire('simplify-announcements-bars')"),
        );
    }

    public function boot(Panel $panel): void {}
}
