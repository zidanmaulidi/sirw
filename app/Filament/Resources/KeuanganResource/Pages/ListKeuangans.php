<?php

namespace App\Filament\Resources\KeuanganResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\KeuanganResource;
use App\Filament\Resources\KeuanganResource\Widgets\StatsOverview;

class ListKeuangans extends ListRecords
{
    protected static string $resource = KeuanganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data Keuangan') -> visible(fn () => auth()->user()->hasRole(['admin','bendahara_rw'])),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
