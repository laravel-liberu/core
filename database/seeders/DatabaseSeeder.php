<?php

namespace LaravelLiberu\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelLiberu\Countries\Database\Seeders\CountrySeeder;
use LaravelLiberu\Localisation\Database\Seeders\LanguageSeeder;
use LaravelLiberu\Roles\Database\Seeders\RoleSeeder;
use LaravelLiberu\UserGroups\Database\Seeders\UserGroupSeeder;
use LaravelLiberu\Users\Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserGroupSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
        ]);
    }
}
