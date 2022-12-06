<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'memorialbook:install';

    protected $description = 'Installing test data';

    public function handle(): int
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        $this->call('migrate');
        $this->call('storage:link');

        return Command::SUCCESS;
    }
}
