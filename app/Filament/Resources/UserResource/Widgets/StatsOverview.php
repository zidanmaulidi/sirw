<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Faker\Provider\Base;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.user-resource.widgets.stats-overview';

    protected function getCards(): array
    {
        return [
            Card::make('Users', User::all()->count()),
            Card::make('Bounce rate', '21%'),
            // Card::make('Average time on page', '3:12'),
        ];
    }

}
