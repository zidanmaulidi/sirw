<?php

namespace App\Filament\Resources\SuratResource\Pages;

use App\Filament\Resources\SuratResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSurat extends EditRecord
{
    protected static string $resource = SuratResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
