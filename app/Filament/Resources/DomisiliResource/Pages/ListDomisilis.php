<?php

namespace App\Filament\Resources\DomisiliResource\Pages;

use App\Filament\Resources\DomisiliResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDomisilis extends ListRecords
{
    protected static string $resource = DomisiliResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
