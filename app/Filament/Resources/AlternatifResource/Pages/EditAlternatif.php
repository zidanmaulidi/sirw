<?php

namespace App\Filament\Resources\AlternatifResource\Pages;

use App\Filament\Resources\AlternatifResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlternatif extends EditRecord
{
    protected static string $resource = AlternatifResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
