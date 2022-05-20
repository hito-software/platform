<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Client;
use Hito\Platform\Repositories\ClientRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ClientServiceImpl implements ClientService
{
    public function __construct(private ClientRepository $clientRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->clientRepository->getAll();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->clientRepository->getAllPaginated();
    }

    public function create(?string $name, ?string $description, string $countryId, ?string $address = null): Client
    {
        return $this->clientRepository->create($name, $description, $countryId, $address);
    }

    public function getById(string $id): Client
    {
        return $this->clientRepository->getById($id);
    }

    public function update(string $id, array $data): bool
    {
        return $this->clientRepository->update($id, $data);
    }
}
