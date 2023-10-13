<?php

namespace LaravelLiberu\Core\Commands;

use Illuminate\Console\Command;
use LaravelLiberu\Core\Models\Preference;

class ClearPreferences extends Command
{
    protected $signature = 'liberu:preferences:clear';

    protected $description = 'Clears user preferences';

    public function handle()
    {
        Preference::truncate();

        $this->info('Preferences were successfully cleared.');
    }
}
