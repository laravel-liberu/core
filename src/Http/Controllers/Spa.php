<?php

namespace LaravelLiberu\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Core\Services\State\Builder;

class Spa extends Controller
{
    public function __invoke()
    {
        return (new Builder())->handle();
    }
}
