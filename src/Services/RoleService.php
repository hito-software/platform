<?php


namespace Hito\Platform\Services;


use Hito\Platform\Models\Team;
use Hito\Platform\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface RoleService
{
    public function getByIds(array $ids): Collection;

    public function getById(string $id): Role;

    public function create(string $type, ?string $name = null, ?string $description = null, ?bool $required = null): Role;

    public function getAllByType(string $type): Collection;

    public function getRequiredByType(string $type, bool $isRequired = true): Collection;

    public function update(string $id, array $data): bool;

    public function mapTypeToClassType(string $type): ?string;

    public function mapClassTypeToType(string $type): ?string;
}
