<?php

namespace Hito\Platform\Traits;

use Hito\Platform\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Traits\HasRoles;

trait HasGroups
{
    use HasRoles;

    /**
     * @return BelongsToMany
     */
    public function groups(): BelongsToMany
    {
        return $this->roles();
    }

    /**
     * @param Builder $query
     * @param string|int|array|Role|Collection $groups
     * @param string|null $guard
     * @return Builder
     */
    public function scopeGroup(Builder $query, string|int|array|Role|Collection $groups, string $guard = null): Builder
    {
        return $this->scopeRole($query, $groups, $guard);
    }

    /**
     * @param array|string|int|Role|Collection ...$groups
     * @return User
     */
    public function assignGroup(array|string|int|Role|Collection ...$groups): User
    {
        return $this->assignRole($groups);
    }

    /**
     * @param string|int|Role $group
     * @return User
     */
    public function removeGroup(string|int|Role $group): User
    {
        return $this->removeRole($group);
    }

    /**
     * @param array|Role|Collection|string|int ...$groups
     * @return User
     */
    public function syncGroups(array|Role|Collection|string|int ...$groups): User
    {
        return $this->syncRoles($groups);
    }

    /**
     * @param string|int|array|Role|Collection $groups
     * @param string|null $guard
     * @return bool
     */
    public function hasGroup(string|int|array|Role|Collection $groups, string $guard = null): bool
    {
        return $this->hasRole($groups, $guard);
    }

    /**
     * @param string|int|array|Role|Collection ...$groups
     * @return bool
     */
    public function hasAnyGroup(string|int|array|Role|Collection ...$groups): bool
    {
        return $this->hasAnyRole($groups);
    }

    /**
     * @param Role|array|string|Collection $groups
     * @param string|null $guard
     * @return bool
     */
    public function hasAllGroups(Role|array|string|Collection $groups, string $guard = null): bool
    {
        return $this->hasAllRoles($groups, $guard);
    }

    /**
     * @return Collection
     */
    public function getGroupNames(): Collection
    {
        return $this->getRoleNames();
    }
}
