<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface LocationService
{
    public function create(string $name, string $countryId, string $address, ?string $description = null): Location;

    public function getById(string $id): Location;

    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function update(string $id, array $data, ?string $userId = null): Location;
}
