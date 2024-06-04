<?php

namespace App\Filament\Resources\RangkingResource\Pages;

use App\Filament\Resources\RangkingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRangking extends EditRecord
{
    protected static string $resource = RangkingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
