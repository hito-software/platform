<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Project;
use Hito\Platform\Models\Role;
use Hito\Platform\Models\Team;
use Hito\Platform\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\Collection;

class RoleServiceImpl implements RoleService
{
    public function __construct(private RoleRepository $roleRepository)
    {
    }

    public function getByIds(array $ids): Collection
    {
        return $this->roleRepository->getByIds($ids);
    }

    public function getById(string $id): Role
    {
        return $this->roleRepository->getById($id);
    }

    public function create(string $type, ?string $name = null, ?string $description = null, ?bool $required = null): Role
    {
        return $this->roleRepository->create($this->mapTypeToClassType($type), $name, $description, $required);
    }

    public function getAllByType(string $type): Collection
    {
        return $this->roleRepository->getAllByType($this->mapTypeToClassType($type));
    }

    public function getRequiredByType(string $type, bool $isRequired = true): Collection
    {
        return $this->roleRepository->getRequiredByType($type, $isRequired);
    }

    public function update(string $id, array $data): bool
    {
        return $this->roleRepository->update($id, $data);
    }

    public function mapTypeToClassType(string $type): ?string
    {
        return match ($type) {
            'team' => Team::class,
            'project' => Project::class,
            default => null
        };
    }

    public function mapClassTypeToType(string $type): ?string
    {
        return match ($type) {
            Team::class => 'team',
            Project::class => 'project',
            default => null
        };
    }
}
