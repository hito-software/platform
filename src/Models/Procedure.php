<?php

namespace Hito\Platform\Models;

use Hito\Admin\Enums\Status;
use Hito\Core\Database\Traits\Uuid;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tonysm\TurboLaravel\Models\Broadcasts;
use Str;

/**
 * Hito\Platform\Models\Procedure
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property \Illuminate\Support\Carbon $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Procedure whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hito\Platform\Models\Location[] $locations
 * @property-read int|null $locations_count
 */
class Procedure extends Model
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
            new PrivateChannel('procedures'),
        ];
    }

    protected $fillable = [
        'name',
        'description',
        'content',
        'published_at',
        'status',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => Status::class
    ];

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class);
    }
}
