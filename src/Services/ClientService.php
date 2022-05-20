<?php


namespace Hito\Platform\Services;


use Hito\Platform\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ClientService
{
    public function getAll(): Collection;

    public function getAllPaginated(): LengthAwarePaginator;

    public function create(?string $name, ?string $description, string $countryId, ?string $address = null): Client;

    public function getById(string $id): Client;

    public function update(string $id, array $data): bool;
}
