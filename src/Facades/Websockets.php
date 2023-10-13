<?php

namespace LaravelLiberu\Core\Facades;

use Illuminate\Support\Facades\Facade;

class Websockets extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'websockets';
    }
}
