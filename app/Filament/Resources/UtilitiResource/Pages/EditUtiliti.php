<?php

namespace App\Filament\Resources\UtilitiResource\Pages;

use App\Filament\Resources\UtilitiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtiliti extends EditRecord
{
    protected static string $resource = UtilitiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
