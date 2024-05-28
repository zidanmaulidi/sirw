<?php

namespace App\Filament\Resources\LevelUserResource\Widgets;

use Faker\Provider\Base;
use Filament\Widgets\Widget;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.level-user-resource.widgets.stats-overview';

    protected function getStats(): array
    {
        return [
            Card::make('Unique views', '192.1k'),
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Card::make('Bounce rate', '21%'),
                // ->description('7% decrease')
                // ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Card::make('Average time on page', '3:12')
                // ->description('3% increase')
                // ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
