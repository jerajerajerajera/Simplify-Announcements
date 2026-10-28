<?php

declare(strict_types=1);

namespace Simplify\Announcements\Filament\Admin\Resources\Announcements\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Simplify\Announcements\Filament\Admin\Resources\Announcements\AnnouncementResource;

final class ManageAnnouncements extends ManageRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('tabler-plus')
                ->mutateDataUsing(fn (array $data): array => [...$data, 'created_by' => user()?->id]),
        ];
    }
}
