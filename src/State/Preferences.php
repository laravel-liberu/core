<?php

namespace LaravelLiberu\Core\State;

use Illuminate\Support\Facades\Auth;
use LaravelLiberu\Core\Contracts\ProvidesState;

class Preferences implements ProvidesState
{
    public function mutation(): string
    {
        return 'preferences/set';
    }

    public function state(): mixed
    {
        return Auth::user()->preferences();
    }
}
