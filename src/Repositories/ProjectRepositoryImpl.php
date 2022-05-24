<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Project;
use Hito\Platform\Models\TeamMember;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepositoryImpl implements ProjectRepository
{
    public function getAll(): Collection
    {
        return Project::with('teams')->with('country')->get();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Project::with('teams')->with('country')->paginate();
    }

    public function create(string $name, string $clientId, ?string $countryId=null, ?string $address = null, ?array $team = [], ?string $description = null): Project
    {
        $data = compact('name', 'address', 'team', 'description');
        $data['client_id'] = $clientId;
        $data['country_id'] = $countryId;

        return  Project::create($data);
    }

    public function getById(string $id): Project
    {
        return Project::findOrFail($id);
    }

    public function getByIds(array $ids): Collection
    {
        return Project::whereIn('id', $ids)->get();
    }

    public function update(string $id, array $data): bool
    {
        return !!Project::findOrFail($id)->update($data);
    }

    public function syncMembers(string $id, array $data): \Illuminate\Support\Collection
    {
        $project = $this->getById($id);

        $members = collect();

        // Add members
        foreach ($data as $value) {
            $members->push($project->members()->firstOrCreate($value));
        }

        $allowedMembers = $members->pluck('id')->toArray();

        // Remove members
        $project->members()->whereNotIn('id', $allowedMembers)->delete();

        return $members;
    }

    public function syncTeams(string $id, array $teamIds): bool
    {
        $this->getById($id)->teams()->sync($teamIds);

        return true;
    }

    public function getMembersByProjectId(string $id): Collection
    {
        return $this->getById($id)->members()->get();
    }

    public function getRolesByProjectId(string $id): \Illuminate\Support\Collection
    {
        $members = $this->getMembersByProjectId($id);
        return $members->pluck('role')->unique();
    }

    public function getUsersByProjectId(string $id): \Illuminate\Support\Collection
    {
        $members = $this->getMembersByProjectId($id);
        return $members->pluck('user')->unique();
    }

    public function getByUserId(string $userId): \Illuminate\Support\Collection
    {
        // Get projects where the user is in a team
        return TeamMember::whereUserId($userId)->with('team.projects')->get()->pluck('team.projects')->flatten()
            ->unique('id');
    }
}
