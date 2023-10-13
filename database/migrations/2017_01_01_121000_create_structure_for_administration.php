<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $menu = [
        'name' => 'Administration', 'icon' => 'cogs', 'route' => null, 'order_index' => 500, 'has_children' => true,
    ];
};
