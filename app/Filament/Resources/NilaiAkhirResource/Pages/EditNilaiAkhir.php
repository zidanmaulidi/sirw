<?php

namespace App\Filament\Resources\NilaiAkhirResource\Pages;

use App\Filament\Resources\NilaiAkhirResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilaiAkhir extends EditRecord
{
    protected static string $resource = NilaiAkhirResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
