<?php


namespace Hito\Platform\Services;


use Hito\Platform\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ProjectService
{
    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function create(string $name, string $clientId, ?string $countryId=null, ?string $address = null, ?array $team = [], ?string $description = null): Project;

    public function getById(string $id): Project;

    public function getByIds(array $ids): Collection;

    public function update(string $id, array $data): bool;

    public function syncMembers(string $id, array $data): \Illuminate\Support\Collection;

    public function syncTeams(string $id, array $teamIds): bool;

    public function getMembersByProjectId(string $id): Collection;

    public function getRolesByProjectId(string $id): \Illuminate\Support\Collection;

    public function getUsersByProjectId(string $id): \Illuminate\Support\Collection;

    public function getByUserId(string $userId): \Illuminate\Support\Collection;
}
