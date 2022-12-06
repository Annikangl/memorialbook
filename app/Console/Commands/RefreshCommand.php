<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshCommand extends Command
{
    protected $signature = 'memorialbook:refresh';

    protected $description = 'Refreshing data';

    public function handle(): int
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        $this->call('migrate:fresh', [
            '--seed' => true
        ]);

        return Command::SUCCESS;
    }
}
