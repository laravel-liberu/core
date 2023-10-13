<?php

namespace LaravelLiberu\Core\Enums;

use LaravelLiberu\Enums\Services\Enum;

class Themes extends Enum
{
    protected static function data(): array
    {
        return config('enso.themes');
    }
}
