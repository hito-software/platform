<?php

namespace Hito\Platform\Repositories;

use Hito\Platform\Models\Country;
use Illuminate\Database\Eloquent\Collection;

interface CountryRepository
{
    public function getAll(): Collection;

    public function getById(string $id): Country;
}
