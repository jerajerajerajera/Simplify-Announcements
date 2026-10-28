<?php

declare(strict_types=1);

namespace Simplify\Announcements\Models;

use App\Models\User;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Simplify\Announcements\Support\Rules;

/**
 * @property int $id
 * @property string $category info, warning or success
 * @property string $title
 * @property ?string $body
 * @property ?CarbonInterface $starts_at empty: right away
 * @property ?CarbonInterface $ends_at empty: until it is ended
 * @property string $audience everyone or admins
 * @property ?string $button_label
 * @property ?string $button_url https://… or /path on this panel
 * @property ?int $created_by
 */
final class Announcement extends Model
{
    protected $table = 'simplify_announcements';

    protected $fillable = ['category', 'title', 'body', 'starts_at', 'ends_at', 'audience', 'button_label', 'button_url', 'created_by'];

    protected $attributes = ['category' => 'info', 'audience' => 'everyone'];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /** The accounts that unpinned it. */
    public function dismissedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'simplify_announcement_dismissals', 'announcement_id', 'user_id');
    }

    /** @param  Builder<self>  $query */
    public function scopeLive(Builder $query): void
    {
        $now = now();
        $query->where(fn (Builder $q) => $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now))
            ->where(fn (Builder $q) => $q->whereNull('ends_at')->orWhere('ends_at', '>', $now));
    }

    /** The live announcements this account sees and has not unpinned, newest first. */
    public static function barsFor(User $user): Builder
    {
        return self::query()
            ->live()
            ->when(! $user->isAdmin(), fn (Builder $q) => $q->where('audience', 'everyone'))
            ->whereDoesntHave('dismissedBy', fn (Builder $q) => $q->whereKey($user->getKey()))
            ->latest();
    }

    public function state(): string
    {
        return Rules::state($this->starts_at?->getTimestamp(), $this->ends_at?->getTimestamp(), time());
    }

    public function isLive(): bool
    {
        return $this->state() === 'live';
    }
}
