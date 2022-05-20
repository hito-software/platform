<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Hito\Platform\Models\TeamMember
 *
 * @property string $id
 * @property int $team_id
 * @property int $user_id
 * @property int $role_id
 * @property int $priority
 * @property-read \Hito\Platform\Models\Role $role
 * @property-read \Hito\Platform\Models\Team $team
 * @property-read \Hito\Platform\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUserId($value)
 * @mixin \Eloquent
 */
class TeamMember extends Model
{
    use HasFactory;
    use Uuid;

    protected $with = [
        'team',
        'user',
        'role'
    ];

    protected $fillable = [
        'team_id',
        'user_id',
        'role_id'
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
