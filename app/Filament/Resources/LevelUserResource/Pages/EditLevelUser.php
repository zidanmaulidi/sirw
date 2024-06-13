<?php

namespace App\Filament\Resources\LevelUserResource\Pages;


use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LevelUserResource;

class EditLevelUser extends EditRecord
{
    protected static string $resource = LevelUserResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make()->visible(fn () => auth::user()->hasRole('admin')),
            Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole(['admin','bendahara_rw'])),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
