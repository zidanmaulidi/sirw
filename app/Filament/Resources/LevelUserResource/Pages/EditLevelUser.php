<?php

namespace App\Filament\Resources\LevelUserResource\Pages;

use App\Filament\Resources\LevelUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevelUser extends EditRecord
{
    protected static string $resource = LevelUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->visible(fn () => Auth::user()->hasRole('admin')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
