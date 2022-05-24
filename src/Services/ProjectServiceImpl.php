<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Project;
use Hito\Platform\Repositories\ProjectRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProjectServiceImpl implements ProjectService
{
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->projectRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->projectRepository->getAllPaginated();
    }

    public function create(string $name, string $clientId, ?string $countryId=null, ?string $address = null, ?array $team = [], ?string $description = null): Project
    {
        return $this->projectRepository->create($name, $clientId, $countryId, $address, $team, $description);
    }

    public function getById(string $id): Project
    {
        return $this->projectRepository->getById($id);
    }

    public function getByIds(array $ids): Collection
    {
        return $this->projectRepository->getByIds($ids);
    }

    public function update(string $id, array $data): bool
    {
        return $this->projectRepository->update($id, $data);
    }

    public function syncMembers(string $id, array $data): \Illuminate\Support\Collection
    {
        return $this->projectRepository->syncMembers($id, $data);
    }

    public function syncTeams(string $id, array $teamIds): bool
    {
        return $this->projectRepository->syncTeams($id, $teamIds);
    }

    public function getMembersByProjectId(string $id): Collection
    {
        return $this->projectRepository->getMembersByProjectId($id);
    }

    public function getRolesByProjectId(string $id): \Illuminate\Support\Collection
    {
        return $this->projectRepository->getRolesByProjectId($id);
    }

    public function getUsersByProjectId(string $id): \Illuminate\Support\Collection
    {
        return $this->projectRepository->getUsersByProjectId($id);
    }

    public function getByUserId(string $userId): \Illuminate\Support\Collection
    {
        return $this->projectRepository->getByUserId($userId);
    }
}
