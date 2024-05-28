<?php

namespace App\Filament\Resources\DomisiliResource\Pages;

use App\Filament\Resources\DomisiliResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDomisili extends EditRecord
{
    protected static string $resource = DomisiliResource::class;

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
