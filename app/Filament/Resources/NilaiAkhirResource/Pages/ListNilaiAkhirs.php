<?php

namespace App\Filament\Resources\NilaiAkhirResource\Pages;

use Filament\Pages\Actions;
use App\Services\UtilityService;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NilaiAkhirResource;

class ListNilaiAkhirs extends ListRecords
{
    protected static string $resource = NilaiAkhirResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\ButtonAction::make('Calculate Final Scores')
                ->action('calculateFinalScores')
                ->label('Calculate Final Scores'),
        ];
    }

    public function calculateFinalScores()
    {
        $service = new UtilityService();
        $service->calculateFinalScores();

        $this->notify('success', 'Final scores calculated and table filled successfully.');
    }
}
