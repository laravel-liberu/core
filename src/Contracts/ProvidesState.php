<?php

namespace LaravelLiberu\Core\Contracts;

interface ProvidesState
{
    public function mutation(): string;

    public function state(): mixed;
}
