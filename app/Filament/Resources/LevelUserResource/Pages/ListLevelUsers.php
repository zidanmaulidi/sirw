<?php

namespace App\Filament\Resources\LevelUserResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\LevelUserResource;
use App\Filament\Resources\LevelUserResource\Widgets\StatsOverview;

class ListLevelUsers extends ListRecords
{
    protected static string $resource = LevelUserResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make()->label('Tambah Level User')->visible(fn () => auth::user()->hasRole('admin')),
            Actions\CreateAction::make()->label('Tambah Level User') -> visible(fn () => auth()->user()->hasRole(['admin','bendahara_rw'])),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
