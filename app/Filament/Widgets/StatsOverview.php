<?php

namespace App\Filament\Widgets;

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
            ->color('primary')
            ->description('Jumlah akun')
            ->descriptionIcon('heroicon-o-user'),
            Card::make('Pengurus', User::where('level_users_id', [1,2,3,4] )->count())
            ->color('success')
            ->description('Jumlah Pengurus')
            ->descriptionIcon('heroicon-o-users'),
            Card::make('Warga', User::where('level_users_id', 5 )->count())
            ->color('danger')
            ->description('Jumlah Warga')
            ->descriptionIcon('heroicon-o-user-group'),
            
        ];
        
    }

}
