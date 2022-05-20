<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Location;
use Hito\Platform\Repositories\LocationRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class LocationServiceImpl implements LocationService
{
    public function __construct(private LocationRepository $locationRepository)
    {
    }

    public function create(string $name, string $countryId, string $address, ?string $description = null): Location
    {
        return $this->locationRepository->create($name, $countryId, $address, $description);
    }

    public function getById(string $id): Location
    {
        return $this->locationRepository->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->locationRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->locationRepository->getAllPaginated();
    }

    public function update(string $id, array $data, ?string $userId = null): Location
    {
        return $this->locationRepository->update($id, $data, $userId);
    }
}
