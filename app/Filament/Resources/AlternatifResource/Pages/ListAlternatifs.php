<?php

namespace App\Filament\Resources\AlternatifResource\Pages;

use Filament\Pages\Actions;
use App\Services\UtilityService;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AlternatifResource;

class ListAlternatifs extends ListRecords
{
    protected static string $resource = AlternatifResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Alternatif'),
            Actions\ButtonAction::make('Rangking Alternatifs Table')
                ->action('calculateLangsungRankings')
                ->color('success')
                ->label('Hitung Rangking'),
            Actions\ButtonAction::make('Truncate Alternatifs Table')
                ->action('truncateAlternatifsTable')
                ->color('danger')
                ->label('Delete Data'),
        ];
    }

    public function truncateAlternatifsTable()
    {
        $service = new UtilityService();
        $service->truncateAlternatifsTable();

        $this->notify('success', 'Alternatif table truncated successfully.');
    }

    public function calculateLangsungRankings()
    {
        $service = new UtilityService();
        $service->calculateLangsungRankings();

        $this->notify('success', 'Langsung Rankings calculated and table filled successfully.');
    }
}
