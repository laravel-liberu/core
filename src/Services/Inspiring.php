<?php

namespace LaravelLiberu\Core\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class Inspiring
{
    public static function quote(): string
    {
        $quotes = Config::get('liberu.inspiring.quotes');

        return Collection::wrap($quotes)->random();
    }
}
