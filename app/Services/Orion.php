<?php

namespace App\Services;

use App\MoonShine\Orion\Pages\InfoSystem;
use App\MoonShine\Orion\Resources\UserResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

class Orion
{
    protected array $resources = [];

    protected array $pages = [];

    public function __construct(array $config)
    {
        $this->resources = [
            'users' => [
                'enabled' => $config['users'] ?? false,
                'resource' => UserResource::class,
                'label' => 'users',
            ],
        ];

        $this->pages = [
            'info' => [
                'enabled' => $config['info'] ?? false,
                'page' => InfoSystem::class,
                'label' => 'info',
            ],
        ];
    }

    public function getResources(): array
    {
        return array_values(array_filter(array_map(
            fn($item) => $item['enabled'] ? $item['resource'] : null,
            $this->resources
        )));
    }

    public function getPages(): array
    {
        return array_values(array_filter(array_map(
            fn($item) => $item['enabled'] ? $item['page'] : null,
            $this->pages
        )));
    }

    public function getMenu(): MenuGroup
    {
        $menuItems = [];

        foreach ($this->pages as $item) {
            if ($item['enabled']) {
                $menuItems[] = MenuItem::make($item['label'], $item['page'])
                    ->translatable('orion');
            }
        }

        foreach ($this->resources as $item) {
            if ($item['enabled']) {
                $menuItems[] = MenuItem::make($item['label'], $item['resource'])
                    ->translatable('orion');
            }
        }

        return MenuGroup::make('Orion', $menuItems, 's.rocket-launch');
    }
}
