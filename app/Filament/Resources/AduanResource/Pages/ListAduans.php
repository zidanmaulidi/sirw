<?php

namespace App\Filament\Resources\AduanResource\Pages;

use App\Filament\Resources\AduanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAduans extends ListRecords
{
    protected static string $resource = AduanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Aduan') -> visible(fn () => auth()->user()->hasRole('admin')),
        ];
    }
}
