<?php

namespace LaravelLiberu\Core\Services;

use LaravelLiberu\Helpers\Services\JsonReader;

class DefaultPreferences
{
    public static function data(): object
    {
        $path = resource_path('preferences.json');

        return (new JsonReader($path))->object();
    }
}
