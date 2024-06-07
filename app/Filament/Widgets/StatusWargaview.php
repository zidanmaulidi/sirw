<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Faker\Provider\Base;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatusWargaview extends BaseWidget
{

    protected function getCards(): array
    {
        return [
            Card::make('Warga Tetap', User::where('level_users_id', 5)->where('kependudukan', 'warga tetap' )->count())
            ->description('Jumlah Warga Tetap')
            ->descriptionIcon('heroicon-o-users'),
            Card::make('Warga Pendatang', User::where('level_users_id', 5)->where('kependudukan', 'warga pendatang' )->count())
            ->description('Jumlah Warga Pendatang')
            ->descriptionIcon('heroicon-o-users'),
        ];
        
    }

}
