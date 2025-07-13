<?php

namespace Estivenm0\Moonlaunch\Providers;

use Estivenm0\Moonlaunch\Services\Launch;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;

class MoonlaunchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Launch::class);
    }

    public function boot(CoreContract $core, Launch $launch): void
    {
        $core
            ->resources($launch->getResources());
    }
}
