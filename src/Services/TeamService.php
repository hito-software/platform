<?php


namespace Hito\Platform\Services;


use Hito\Platform\Models\Team;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TeamService
{
    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function create(string $name, ?string $description = null, ?string $userId = null): Team;

    public function getById(string $id): Team;

    public function getByIds(array $ids): Collection;

    public function update(string $id, array $data): bool;

    public function syncMembers(string $id, array $data): Collection;

    public function syncProjects(string $id, array $projectIds): bool;

    public function getMembersByTeamId(string $id): Collection;

    public function getRolesByTeamId(string $id): Collection;

    public function getUsersByTeamId(string $id): Collection;

    public function getByUserId(string $userId): Collection;
}
