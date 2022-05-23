<?php

namespace Hito\Platform\Traits;

trait TranslatableEnum
{
    public function translationNamespace(): string
    {
        return 'hito::';
    }

    public function toString(): string
    {
        return __($this->translationNamespace() . 'enums.' . self::class . '.' . $this->name);
    }
}
