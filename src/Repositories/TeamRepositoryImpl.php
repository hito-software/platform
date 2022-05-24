<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Team;
use Hito\Platform\Models\Role;
use Hito\Platform\Models\TeamMember;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TeamRepositoryImpl implements TeamRepository
{
    public function getAll(): Collection
    {
        return Team::with('projects')->get();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Team::with('projects')->paginate();
    }

    public function create(string $name, ?string $description = null): Team
    {
        $data = compact('name', 'description');

        return Team::create($data);
    }

    public function getById(string $id): Team
    {
        return Team::findOrFail($id);
    }

    public function getByIds(array $ids): Collection
    {
        return Team::whereIn('id', $ids)->get();
    }

    public function update(string $id, array $data): bool
    {
        return !!Team::findOrFail($id)->update($data);
    }

    public function syncMembers(string $id, array $data): \Illuminate\Support\Collection
    {
        $team = $this->getById($id);

        $members = collect();

        // Add members
        foreach ($data as $value) {
            $members->push($team->members()->firstOrCreate($value));
        }

        $allowedMembers = $members->pluck('id')->toArray();

        // Remove members
        $team->members()->whereNotIn('id', $allowedMembers)->delete();

        return $members;
    }

    public function syncProjects(string $id, array $projectIds): bool
    {
        $this->getById($id)->projects()->sync($projectIds);

        return true;
    }

    public function getMembersByTeamId(string $id): Collection
    {
        return $this->getById($id)->members()->get();
    }

    public function getRolesByTeamId(string $id): \Illuminate\Support\Collection
    {
        $members = $this->getMembersByTeamId($id);
        return $members->pluck('role')->unique();
    }

    public function getUsersByTeamId(string $id): \Illuminate\Support\Collection
    {
        $members = $this->getMembersByTeamId($id);
        return $members->pluck('user')->unique();
    }

    public function getByUserId(string $userId): \Illuminate\Support\Collection
    {
        return TeamMember::whereUserId($userId)->get()->pluck('team');
    }
}
