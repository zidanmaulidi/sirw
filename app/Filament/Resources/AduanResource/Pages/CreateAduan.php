<?php

namespace App\Filament\Resources\AduanResource\Pages;

use App\Filament\Resources\AduanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAduan extends CreateRecord
{
    protected static string $resource = AduanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
