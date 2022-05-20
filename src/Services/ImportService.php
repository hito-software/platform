<?php

namespace Hito\Platform\Services;


interface ImportService
{
    public function import(array $files): array;
}
