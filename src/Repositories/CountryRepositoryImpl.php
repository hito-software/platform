<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryRepositoryImpl implements CountryRepository
{
    public function getAll(): Collection
    {
        return Country::all();
    }

    public function getById(string $id): Country
    {
        return Country::findOrFail($id);
    }
}
