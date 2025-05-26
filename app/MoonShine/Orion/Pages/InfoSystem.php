<?php

declare(strict_types=1);

namespace App\MoonShine\Orion\Pages;

use Composer\InstalledVersions;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Support\Attributes\Icon;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;

#[Icon('s.information-circle')]
class InfoSystem extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: __('orion.info');
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        return [
            Grid::make([
                Column::make([
                    ValueMetric::make('LARAVEL')
                        ->value(fn () => app()->version())
                        ->icon('s.cpu-chip'),
                ], 3),

                Column::make([
                    ValueMetric::make('PHP')
                        ->value(fn () => PHP_VERSION)
                        ->icon('s.cube'),
                ], 3),

                Column::make([
                    ValueMetric::make('DATABASE')
                        ->value(fn () => strtoupper(config('database.default')))
                        ->icon('s.circle-stack'),
                ], 3),

                Column::make([
                    ValueMetric::make('OS')
                        ->value(fn () => PHP_OS)
                        ->icon('s.computer-desktop'),
                ], 3),

                Column::make([
                    ValueMetric::make('MOONSHINE')
                        ->value(fn () => InstalledVersions::getVersion('moonshine/moonshine'))
                        ->icon('s.moon'),
                ], 3),

                Column::make([
                    ValueMetric::make('ROLES-PERMISSIONS')
                        ->value(fn () => InstalledVersions::getVersion('sweet1s/moonshine-roles-permissions'))
                        ->icon('s.finger-print'),
                ], 3),

                Column::make([
                    ValueMetric::make('ORION')
                        ->value(fn () => '1.0.0')
                        ->icon('s.rocket-launch'),
                ], 3),

                Column::make([
                    ValueMetric::make('APP_ENV')
                        ->value(fn () => env('APP_ENV'))
                        ->icon('s.rocket-launch'),
                ], 3),

            ]),
        ];
    }
}
