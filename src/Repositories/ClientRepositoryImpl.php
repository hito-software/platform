<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ClientRepositoryImpl implements ClientRepository
{
    public function getAll(): Collection
    {
        return Client::with('projects')->with('country')->get();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Client::with('projects')->with('country')->paginate();
    }

    public function create(?string $name, ?string $description, string $countryId, ?string $address = null): Client
    {
        return Client::create([
            'name' => $name,
            'description' => $description,
            'country_id' => $countryId,
            'address' => $address
        ]);
    }

    public function getById(string $id): Client
    {
        return \Cache::remember("client-{$id}", now()->addDays(7), fn() => Client::findOrFail($id));
    }

    public function update(string $id, array $data): bool
    {
        return !!Client::findOrFail($id)->update($data);
    }
}
