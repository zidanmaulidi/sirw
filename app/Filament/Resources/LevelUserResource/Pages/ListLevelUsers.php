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
            Actions\CreateAction::make()->label('Tambah Level User')->visible(fn () => Auth::user()->hasRole('admin')),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
