<?php

namespace LaravelLiberu\Core\Commands;

use Illuminate\Console\Command;
use LaravelLiberu\Core\Services\Version as Service;

class Version extends Command
{
    protected $signature = 'liberu:version';

    protected $description = 'Display framework version';

    public function handle()
    {
        $version = (new Service());
        $this->info("Current version is {$version->current()}");

        if ($version->isOutdated()) {
            $this->warn("Latest version is {$version->latest()}");
        }
    }
}
