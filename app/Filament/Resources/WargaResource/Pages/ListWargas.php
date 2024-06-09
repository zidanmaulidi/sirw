<?php

namespace App\Filament\Resources\WargaResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\WargaResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WargaResource\Widgets\WargaOverview;

class ListWargas extends ListRecords
{
    protected static string $resource = WargaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data Warga') -> visible(fn () => auth()->user()->hasRole(['admin','sekretaris_rw'])),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            WargaOverview::class,
        ];
    }
}
