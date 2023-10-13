<?php

namespace LaravelLiberu\Core;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use LaravelLiberu\Core\Events\Login;
use LaravelLiberu\Core\Listeners\LoginListener;
use LaravelLiberu\Core\Listeners\PasswordResetListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [LoginListener::class],
        PasswordReset::class => [PasswordResetListener::class],
    ];
}
