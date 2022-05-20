<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Country;
use Hito\Platform\Repositories\CountryRepository;
use Illuminate\Database\Eloquent\Collection;

class CountryServiceImpl implements CountryService
{
    public function __construct(private CountryRepository $countryRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->countryRepository->getAll();
    }

    public function getById(string $id): Country
    {
        return $this->countryRepository->getById($id);
    }
}
