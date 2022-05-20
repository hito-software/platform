<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;
use Tonysm\TurboLaravel\Models\Broadcasts;

/**
 * Hito\Platform\Models\Announcement
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property \Illuminate\Support\Carbon $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $pin_start_at
 * @property \Illuminate\Support\Carbon|null $pin_end_at
 * @property-read mixed $is_pinned
 * @property-read mixed $is_published
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement wherePinEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement wherePinStartAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hito\Platform\Models\Location[] $locations
 * @property-read int|null $locations_count
 */
class Announcement extends Model
{
    use HasFactory;
    use Broadcasts;
    use Uuid;

    protected array $broadcasts = [
        'insertsBy' => 'prepend'
    ];

    public function broadcastsTo(): array
    {
        return [
            $this,
            new PrivateChannel('announcements'),
        ];
    }

    protected $fillable = [
        'name',
        'description',
        'content',
        'published_at',
        'pin_start_at',
        'pin_end_at',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'pin_start_at' => 'datetime',
        'pin_end_at' => 'datetime'
    ];

    public function getIsPinnedAttribute()
    {
        return now()->isBetween($this->pin_start_at, $this->pin_end_at);
    }

    public function getIsPublishedAttribute()
    {
        return now()->isAfter($this->published_at);
    }

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class);
    }
}
