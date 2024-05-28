<?php

namespace App\Filament\Resources\LevelUserResource\Pages;

use App\Filament\Resources\LevelUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLevelUser extends CreateRecord
{
    protected static string $resource = LevelUserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
