<?php

namespace App\Filament\Resources\DomisiliResource\Pages;

use App\Filament\Resources\DomisiliResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDomisili extends CreateRecord
{
    protected static string $resource = DomisiliResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
