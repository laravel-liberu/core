<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Core\Http\Controllers\Spa;

Route::prefix('core')
    ->as('core.')
    ->group(function () {
        Route::get('home', Spa::class)->name('home.index');

        require __DIR__.'/core/preferences.php';
    });
