<?php

namespace LaravelLiberu\Core\State;

use Illuminate\Support\Facades\Config;
use LaravelLiberu\Core\Contracts\ProvidesState;
use LaravelLiberu\Core\Facades\Websockets as Facade;

class Websockets implements ProvidesState
{
    public function mutation(): string
    {
        return 'websockets/configure';
    }

    public function state(): mixed
    {
        return [
            'pusher' => [
                'key' => Config::get('broadcasting.connections.pusher.key'),
                'options' => Config::get('broadcasting.connections.pusher.options'),
            ],
            'authEndpoint' => '/api/broadcasting/auth',
            'channels' => Facade::all(),
        ];
    }
}
