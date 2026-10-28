<?php

declare(strict_types=1);

namespace Simplify\Announcements\Filament\Admin\Resources\Announcements;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Simplify\Announcements\Filament\Admin\Resources\Announcements\Pages\ManageAnnouncements;
use Simplify\Announcements\Models\Announcement;
use Simplify\Announcements\Services\Bell;
use Simplify\Announcements\Services\Push;
use Simplify\Announcements\Support\Rules;

/**
 * Where root admins write, end and delete announcements.
 */
final class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $slug = 'simplify-announcements';

    protected static string|BackedEnum|null $navigationIcon = 'tabler-speakerphone';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationLabel(): string
    {
        return self::text('title');
    }

    public static function getModelLabel(): string
    {
        return self::text('model');
    }

    public static function getPluralModelLabel(): string
    {
        return self::text('title');
    }

    public static function form(Schema $schema): Schema
    {
        $zone = self::timezone();

        return $schema->columns(1)->components([
            ToggleButtons::make('category')
                ->label(self::text('form.category'))
                ->options(self::options('category', Rules::CATEGORIES))
                ->colors(array_combine(Rules::CATEGORIES, array_map(Rules::color(...), Rules::CATEGORIES)))
                ->icons(array_combine(Rules::CATEGORIES, array_map(Rules::icon(...), Rules::CATEGORIES)))
                ->inline()
                ->required()
                ->default('info'),
            TextInput::make('title')
                ->label(self::text('form.title'))
                ->required()
                ->maxLength(Rules::TITLE_LENGTH),
            Textarea::make('body')
                ->label(self::text('form.body'))
                ->rows(3)
                ->maxLength(Rules::BODY_LENGTH),
            Grid::make(2)->schema([
                DateTimePicker::make('starts_at')
                    ->label(self::text('form.starts_at'))
                    ->seconds(false)
                    ->timezone($zone)
                    ->helperText(self::text('form.starts_at_help', ['zone' => $zone])),
                DateTimePicker::make('ends_at')
                    ->label(self::text('form.ends_at'))
                    ->seconds(false)
                    ->timezone($zone)
                    ->after('starts_at')
                    ->helperText(self::text('form.ends_at_help')),
            ]),
            ToggleButtons::make('audience')
                ->label(self::text('form.audience'))
                ->options(self::options('audience', Rules::AUDIENCES))
                ->inline()
                ->required()
                ->default('everyone'),
            Grid::make(2)->schema([
                TextInput::make('button_url')
                    ->label(self::text('form.button_url'))
                    ->placeholder(self::text('form.button_url_placeholder'))
                    ->maxLength(Rules::URL_LENGTH)
                    ->regex(Rules::URL_PATTERN)
                    ->validationMessages(['regex' => self::text('form.button_url_invalid')]),
                TextInput::make('button_label')
                    ->label(self::text('form.button_label'))
                    ->placeholder(self::text('bars.open'))
                    ->maxLength(Rules::LABEL_LENGTH),
            ]),
            Toggle::make('in_bell')
                ->label(self::text('form.in_bell'))
                ->helperText(self::text('form.in_bell_help')),
            Toggle::make('push')
                ->label(self::text('form.push'))
                ->helperText(self::text('form.push_help'))
                ->default(true)
                ->visible(Push::available()),
        ]);
    }

    public static function table(Table $table): Table
    {
        $zone = self::timezone();

        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->label(self::text('form.title'))
                    ->icon(fn (Announcement $record): string => Rules::icon($record->category))
                    ->iconColor(fn (Announcement $record): string => Rules::color($record->category))
                    ->description(fn (Announcement $record): ?string => $record->body ? str($record->body)->limit(80)->toString() : null)
                    ->searchable()
                    ->wrap(),
                TextColumn::make('state')
                    ->label(self::text('table.state'))
                    ->state(fn (Announcement $record): string => $record->state())
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'live' => 'success',
                        'scheduled' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => self::text('state.'.$state)),
                TextColumn::make('starts_at')
                    ->label(self::text('form.starts_at'))
                    ->dateTime(timezone: $zone)
                    ->placeholder(self::text('table.right_away')),
                TextColumn::make('ends_at')
                    ->label(self::text('form.ends_at'))
                    ->dateTime(timezone: $zone)
                    ->placeholder(self::text('table.until_ended')),
                TextColumn::make('audience')
                    ->label(self::text('form.audience'))
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(fn (string $state): string => self::text('audience.'.$state)),
                TextColumn::make('in_bell_at')
                    ->label(self::text('table.in_bell'))
                    ->icon('tabler-bell')
                    ->state(fn (Announcement $record): ?string => match (true) {
                        ! $record->in_bell => null,
                        $record->in_bell_at !== null => self::text('table.in_bell_sent'),
                        default => self::text('table.in_bell_waiting'),
                    })
                    ->placeholder('-'),
                TextColumn::make('pushed_to')
                    ->label(self::text('table.push'))
                    ->icon('tabler-device-mobile')
                    ->state(fn (Announcement $record): ?string => $record->push ? self::text('table.pushed_to', ['count' => $record->pushed_to]) : null)
                    ->placeholder('-')
                    ->visible(Push::available()),
            ])
            ->recordActions([
                EditAction::make()->after(fn () => self::deliverNow()),
                Action::make('end')
                    ->label(self::text('table.end'))
                    ->icon('tabler-player-stop')
                    ->color('warning')
                    ->visible(fn (Announcement $record): bool => $record->state() !== 'ended')
                    ->requiresConfirmation()
                    ->modalHeading(self::text('table.end_heading'))
                    ->modalDescription(self::text('table.end_help'))
                    ->action(fn (Announcement $record) => $record->update(['ends_at' => now()])),
                DeleteAction::make(),
            ])
            ->emptyStateIcon('tabler-speakerphone')
            ->emptyStateHeading(self::text('table.empty'))
            ->emptyStateDescription(self::text('table.empty_help'));
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAnnouncements::route('/'),
        ];
    }

    /** A live announcement reaches the bell and devices right away instead of on the next scheduler run. */
    public static function deliverNow(): void
    {
        Bell::deliverDue();
        Push::sendDue();
    }

    /** Times are stored in UTC and shown in the admin's own time zone from their Pelican profile. */
    public static function timezone(): string
    {
        return user()?->timezone ?: (string) config('app.timezone', 'UTC');
    }

    /**
     * @param  list<string>  $keys
     * @return array<string, string>
     */
    private static function options(string $group, array $keys): array
    {
        return array_combine($keys, array_map(fn (string $key): string => self::text($group.'.'.$key), $keys));
    }

    /** @param  array<string, string>  $replace */
    private static function text(string $key, array $replace = []): string
    {
        return __('simplify-announcements::announcements.'.$key, $replace);
    }
}
