<?php

namespace App\Filament\Resources\WargaResource\Widgets;

use App\Models\Warga;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class WargaOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.warga-resource.widgets.warga-overview';

    protected function getCards(): array
    {
        return [
            Card::make('Warga', Warga::all()->count())
            ->description('Jumlah Warga')
            ->color('primary')
            ->descriptionIcon('heroicon-o-user'),

            Card::make('RT 10', Warga::where('domisilis_id', 1)->count())
            ->description('Jumlah Warga RT 10')
            ->descriptionIcon('heroicon-o-user'),

            Card::make('RT 11', Warga::where('domisilis_id', 2)->count())
            ->description('Jumlah Warga RT 11')
            ->descriptionIcon('heroicon-o-user'),

            // Card::make('Warga Tetap', Warga::where('kependudukan' , 'warga tetap')->count())
            // ->description('Jumlah Warga tetap')
            // ->descriptionIcon('heroicon-o-user'),

            // Card::make('Warga Pendatang', Warga::where('kependudukan' , 'warga pendatang')->count())
            // ->description('Jumlah Warga pendatang')
            // ->descriptionIcon('heroicon-o-user'),
        ];
    }
}
