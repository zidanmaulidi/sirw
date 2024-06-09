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
            Actions\ButtonAction::make('Calculate Rankings') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('calculateRankings')
                ->label('Htitug Tahap Rangking'),

            Actions\ButtonAction::make('Rangking Alternatifs Table') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('calculateLangsungRankings')
                ->color('success')
                ->label('Hitung Langsung Perangkingan'),

            Actions\ButtonAction::make('Truncate Rangkings Table') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('truncateRankingsTable')
                ->color('danger')
                ->label('Hapus Semua Data'),
        ];
    }

    public function calculateRankings()
    {
        $service = new UtilityService();
        $service->calculateRankings();

        $this->notify('success', 'Rankings calculated and table filled successfully.');
    }

    public function calculateLangsungRankings()
    {
        $service = new UtilityService();
        $service->calculateLangsungRankings();

        $this->notify('success', 'Langsung Rankings calculated and table filled successfully.');
    }

    public function truncateRankingsTable()
    {
        $service = new UtilityService();
        $service->truncateRankingsTable();

        $this->notify('success', 'Rankings table truncated successfully.');
    }
}
