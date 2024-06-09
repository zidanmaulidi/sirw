<?php

namespace App\Filament\Resources\InformasiResource\Pages;

use App\Filament\Resources\InformasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformasi extends CreateRecord
{
    protected static string $resource = InformasiResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     // Set `created_by` automatically
    //     $data['created_by'] = auth()->id();

    //     return $data;
    // }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
