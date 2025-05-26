<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\AdminResource;
use App\MoonShine\Resources\RoleResource;
use App\Services\Orion;
use App\Services\ThemeApplier;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     */
    public function boot(
        CoreContract $core,
        ConfiguratorContract $config,
        ColorManagerContract $colorManager
    ): void {
        // $config->authEnable();

        (new ThemeApplier($colorManager))->theme1();
        // (new ThemeApplier($colorManager))->theme2();

        $core
            ->resources([
                ...app(Orion::class)->getResources(),
                AdminResource::class,
                RoleResource::class,
                PermissionResource::class,
            ])
            ->pages([
                ...$config->getPages(),
                ...app(Orion::class)->getPages(),
            ]);
    }
}
