<?php

namespace App\Filament\Resources\InformasiResource\Pages;

use App\Filament\Resources\InformasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasis extends ListRecords
{
    protected static string $resource = InformasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
