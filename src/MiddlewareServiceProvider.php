<?php

namespace LaravelLiberu\Core;

use Illuminate\Support\ServiceProvider;
// use LaravelLiberu\ActionLogger\Http\Middleware\ActionLogger;
use LaravelLiberu\Core\Http\Middleware\EnsureFrontendRequestsAreStateful as Stateful;
use LaravelLiberu\Core\Http\Middleware\VerifyActiveState;
use LaravelLiberu\Core\Http\Middleware\XssSanitizer;
use LaravelLiberu\Impersonate\Http\Middleware\Impersonate;
use LaravelLiberu\Localisation\Http\Middleware\SetLanguage;
use LaravelLiberu\Permissions\Http\Middleware\VerifyRouteAccess;

class MiddlewareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app['router']
            ->aliasMiddleware('verify-active-state', VerifyActiveState::class);

        $this->app['router']
            ->aliasMiddleware('xss-sanitizer', XssSanitizer::class);

        $this->app['router']
            ->aliasMiddleware('ensure-frontent-requests-are-stateful', Stateful::class);

        $this->app['router']->middlewareGroup('core', [
            VerifyActiveState::class,
            // ActionLogger::class,
            Impersonate::class,
            VerifyRouteAccess::class,
            SetLanguage::class,
        ]);
    }
}
