<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'memorialbook:install';

    protected $description = 'Command description';

    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->call('storage:link');
        return Command::SUCCESS;
    }
}
