<?php

namespace LaravelLiberu\Core\State;

use LaravelLiberu\Core\Contracts\ProvidesState;
use LaravelLiberu\Core\Enums\Themes as Enum;

class Themes implements ProvidesState
{
    public function mutation(): string
    {
        return 'layout/setThemes';
    }

    public function state(): mixed
    {
        return Enum::all();
    }
}
