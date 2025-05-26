<?php

namespace App\Providers;

use App\Services\Orion;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Orion::class, function ($app) {
            $config = $app['config']->get('orion');

            return new Orion($config);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
