<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Hito\Platform\Models\Timezone
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $abbr
 * @property string|null $offset
 * @property string|null $isdst
 * @property string|null $text
 * @property array|null $utc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereIsdst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereOffset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereUtc($value)
 * @mixin \Eloquent
 */
class Timezone extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'name',
        'abbr',
        'offset',
        'isdst',
        'text',
        'utc',
    ];

    protected $casts = [
        'utc' => 'array'
    ];

    public function getOffsetAttribute(int $value)
    {
        if ($this->isdst && !now()->isDST()) {
            $user = now()->addHours($value - 1);
        } elseif(now()->isDST()) {
            $user = now()->addHours($value - 1);
        } else {
            $user = now()->addHours($value);
        }

        return $user->tzName;
    }
}
