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
            Actions\ButtonAction::make('Rangking Alternatifs Table') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('calculateLangsungRankings')
                ->color('success')
                ->label('Hitung Langsung Perangkingan'),
            Actions\ButtonAction::make('Truncate Alternatifs Table') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('truncateAlternatifsTable')
                ->color('danger')
                ->label('Hapus Data'),
        ];
    }

    public function truncateAlternatifsTable()
    {
        $service = new UtilityService();
        $service->truncateAlternatifsTable();

        $this->notify('success', 'Data Alternatif berhasil dihapus');
    }

    public function calculateLangsungRankings()
    {
        $service = new UtilityService();
        $service->calculateLangsungRankings();

        $this->notify('success', 'Perangkingan Langsung berhasil dihitung');
    }
}
