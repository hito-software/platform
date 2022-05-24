<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class LocationRepositoryImpl implements LocationRepository
{
    public function create(string $name, string $countryId, string $address, ?string $description = null): Location
    {
        $data = compact('name', 'description', 'address');
        $data['country_id'] = $countryId;

        return Location::create($data);
    }

    public function getById(string $id): Location
    {
        return Location::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Location::all();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Location::paginate();
    }

    public function update(string $id, array $data): Location
    {
        $model = $this->getById($id);
        $model->update($data);

        return $model;
    }
}
