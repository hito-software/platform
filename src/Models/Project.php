<?php

namespace Hito\Platform\Models;

use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Hito\Platform\Models\Project
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $country_id
 * @property string|null $address
 * @property string|null $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Hito\Platform\Models\Client|null $client
 * @property-read \Hito\Platform\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hito\Platform\Models\ProjectMember[] $members
 * @property-read int|null $members_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hito\Platform\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Query\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Project withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hito\Platform\Models\User[] $users
 * @property-read int|null $users_count
 * @property string|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 */
class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $with = [
        'client'
    ];

    protected $fillable = [
        'name',
        'description',
        'country_id',
        'client_id',
        'address',
        'user_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_members')->distinct();
    }

    public function getBannerAttribute(): string
    {
        $hash = md5($this->id);
        return "https://picsum.photos/seed/{$hash}/400/200";
    }

    public function getAvatarAttribute(): string
    {
        $hash = md5($this->id);
        return "https://picsum.photos/seed/{$hash}-avatar/100/100";

    }
}
