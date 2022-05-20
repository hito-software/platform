<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Hito\Platform\Models\ProjectMember
 *
 * @property string $id
 * @property int $project_id
 * @property int $user_id
 * @property int $role_id
 * @property int $priority
 * @property-read \Hito\Platform\Models\Project $project
 * @property-read \Hito\Platform\Models\Role $role
 * @property-read \Hito\Platform\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectMember whereUserId($value)
 * @mixin \Eloquent
 */
class ProjectMember extends Model
{
    use HasFactory;
    use Uuid;

    protected $with = [
        'project',
        'user',
        'role'
    ];

    protected $fillable = [
        'project_id',
        'user_id',
        'role_id'
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
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
