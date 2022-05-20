<?php

namespace Hito\Platform\Services;

use Hito\Platform\Models\Country;
use Illuminate\Database\Eloquent\Collection;

interface CountryService
{
    public function getAll(): Collection;

    public function getById(string $id): Country;
}
