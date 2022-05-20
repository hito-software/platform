<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface LocationRepository
{
    public function create(string $name, string $countryId, string $address, ?string $description = null): Location;

    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function getById(string $id): Location;

    public function update(string $id, array $data, ?string $userId = null): Location;
}
