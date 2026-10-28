<?php

declare(strict_types=1);

namespace Simplify\Announcements;

use Simplify\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;
use Simplify\Core\Addons\Addon;

/** How Announcements shows up in Simplify's add-on list. */
final class AnnouncementsAddon extends Addon
{
    public function id(): string
    {
        return SimplifyAnnouncementsPlugin::ID;
    }

    public function name(): string
    {
        return __('simplify-announcements::announcements.addon.name');
    }

    public function description(): string
    {
        return __('simplify-announcements::announcements.addon.description');
    }

    public function icon(): string
    {
        return 'tabler-speakerphone';
    }

    public function settingsUrl(): ?string
    {
        return user()?->isRootAdmin() ? AnnouncementResource::getUrl(panel: 'admin') : null;
    }
}
