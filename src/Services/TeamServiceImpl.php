<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Team;
use Hito\Platform\Repositories\TeamRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TeamServiceImpl implements TeamService
{
    public function __construct(private TeamRepository $teamRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->teamRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->teamRepository->getAllPaginated();
    }

    public function create(string $name, ?string $description = null): Team
    {
        return $this->teamRepository->create($name, $description);
    }

    public function getById(string $id): Team
    {
        return $this->teamRepository->getById($id);
    }

    public function getByIds(array $ids): Collection
    {
        return $this->teamRepository->getByIds($ids);
    }

    public function update(string $id, array $data): bool
    {
        return $this->teamRepository->update($id, $data);
    }

    public function syncMembers(string $id, array $data): Collection
    {
        return $this->teamRepository->syncMembers($id, $data);
    }

    public function syncProjects(string $id, array $projectIds): bool
    {
        return $this->teamRepository->syncProjects($id, $projectIds);
    }

    public function getMembersByTeamId(string $id): Collection
    {
        return $this->teamRepository->getMembersByTeamId($id);
    }

    public function getRolesByTeamId(string $id): Collection
    {
        return $this->teamRepository->getRolesByTeamId($id);
    }

    public function getUsersByTeamId(string $id): Collection
    {
        return $this->teamRepository->getUsersByTeamId($id);
    }

    public function getByUserId(string $userId): Collection
    {
        return $this->teamRepository->getByUserId($userId);
    }
}
