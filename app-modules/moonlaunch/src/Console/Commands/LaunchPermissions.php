<?php

namespace Estivenm0\Moonlaunch\Console\Commands;

use Estivenm0\Moonlaunch\Services\Launch;
use Illuminate\Console\Command;

class LaunchPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'launch:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the permissions for the resources specified in the handle method by executing multiple related commands.';

    /**
     * Execute the console command.
     */
    public function handle(Launch $launch)
    {
        foreach ($launch->getResources() as $item) {
            $this->call('moonshine-rbac:permissions', [
                'resourceName' => class_basename($item),
            ]);
        }

        // $this->call('moonshine-rbac:permissions', [
        //     'resourceName' => ''
        // ]);

        $this->call('moonshine-rbac:role', [
            'name' => 'Super Admin',
            '--all-permissions' => true,
        ]);
    }
}
