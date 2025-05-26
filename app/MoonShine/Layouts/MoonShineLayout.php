<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\AdminResource;
use App\MoonShine\Resources\RoleResource;
use App\Services\Orion;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\Layout\Favicon;
use MoonShine\UI\Components\Layout\Footer;
use MoonShine\UI\Components\Layout\Layout;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    // protected function getFaviconComponent(): Favicon
    // {
    //     return parent::getFaviconComponent()->customAssets([
    //         'apple-touch' => 'favicon_path',
    //         '32' => 'favicon_path',
    //         '16' => 'favicon_path',
    //         'safari-pinned-tab' => 'favicon_path',
    //         'web-manifest' => 'favicon_path',
    //     ]);
    // }

    protected function getFooterComponent(): Footer
    {
        return Footer::make()
            ->copyright(
                fn (): string => 'Credits To <a href="https://moonshine-laravel.com/" target="_blank">MoonShine</a>'
            )
            ->menu($this->getFooterMenu());
    }

    protected function menu(): array
    {
        return [
            app(Orion::class)->getMenu(),

            MenuGroup::make('system', [
                MenuItem::make('admins_title', AdminResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('role', RoleResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('permissions', PermissionResource::class)
                    ->translatable('moonshine-rbac::ui')
                    ->icon('s.shield-check'),

            ])
                ->translatable('moonshine::ui.resource')
                ->icon('m.cube'),

        ];
    }

    /**
     * @param  ColorManager  $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        // parent::colors($colorManager);
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
