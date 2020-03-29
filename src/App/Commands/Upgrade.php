<?php

namespace LaravelEnso\Core\App\Commands;

use Illuminate\Console\Command;
use LaravelEnso\Core\App\Services\Upgrades\ActionLogsIndex;
use LaravelEnso\Core\App\Services\Upgrades\Avatars;
use LaravelEnso\Core\App\Services\Upgrades\Companies;
use LaravelEnso\Core\App\Services\Upgrades\Permissions;
use LaravelEnso\Upgrade\App\Services\Upgrade as Service;

class Upgrade extends Command
{
    protected $signature = 'enso:upgrade';

    protected $description = 'This command will upgrade Enso from v3.7.* to 3.8.*';

    private $upgrades = [
        ActionLogsIndex::class,
        Avatars::class,
        Companies::class,
        Permissions::class,
    ];

    public function handle()
    {
        (new Service($this->upgrades))->handle();
    }
}
