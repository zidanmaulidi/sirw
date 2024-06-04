<?php

namespace App\Filament\Resources\UtilitiResource\Pages;

use Filament\Pages\Actions;
use App\Services\UtilityService;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\UtilitiResource;

class ListUtilitis extends ListRecords
{
    protected static string $resource = UtilitiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ButtonAction::make('Calculate Utilities')
                ->action('calculateUtilities')
                ->label('Calculate Utilities'),
            Actions\ButtonAction::make('Truncate Utilities Table')
                ->action('truncateUtilitiesTable')
                ->color('danger')
                ->label('Delete Data'),                
        ];
    }
    public function calculateUtilities()
    {
        $service = new UtilityService();
        $service->calculateAndFillUtilities();

        $this->notify('success', 'Utilities calculated and table filled successfully.');
    }
    public function truncateUtilitiesTable()
    {
        $service = new UtilityService();
        $service->truncateUtilitiesTable();

        $this->notify('success', 'Utilities table truncated successfully.');
    }
}
