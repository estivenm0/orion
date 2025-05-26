<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OrionInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orion:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and configure the Orion starter kit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('key:generate');

        $this->call('migrate');

        $this->call('orion:permissions');

        $this->call('moonshine-rbac:user');
    }
}
