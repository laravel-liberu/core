<?php

namespace LaravelLiberu\Core\Http\Middleware;

use Closure;
use LaravelLiberu\Core\Exceptions\Authentication;
use LaravelLiberu\Core\Traits\Logout;

class VerifyActiveState
{
    use Logout;

    public function handle($request, Closure $next)
    {
        if ($request->user()->isInactive()) {
            $this->logout($request);

            throw Authentication::disabledAccount();
        }

        return $next($request);
    }
}
