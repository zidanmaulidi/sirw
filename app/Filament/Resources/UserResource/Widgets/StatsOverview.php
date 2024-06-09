<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Faker\Provider\Base;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    protected function getCards(): array
    {
        return [
            Card::make('User', User::all()->count())
            ->description('Jumlah akun')
            ->descriptionIcon('heroicon-o-user'),
        ];
    }

}
