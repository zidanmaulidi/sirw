<?php

namespace App\Filament\Resources\RangkingResource\Pages;

use Filament\Pages\Actions;
use App\Services\UtilityService;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\RangkingResource;

class ListRangkings extends ListRecords
{
    protected static string $resource = RangkingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ButtonAction::make('Calculate Rankings')
                ->action('calculateRankings')
                ->label('Calculate Rankings'),
        ];
    }

    public function calculateRankings()
    {
        $service = new UtilityService();
        $service->calculateRankings();

        $this->notify('success', 'Rankings calculated and table filled successfully.');
    }
}
