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
            Actions\ButtonAction::make('Calculate Final Scores') -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('calculateFinalScores')
                ->label('Hitung Tahap Nilai Akhir'),
            Actions\ButtonAction::make('Truncate NilaiAkhirs Table')  -> visible(fn () => auth()->user()->hasRole(['admin','rw']))
                ->action('truncateNilaiAkhirsTable')
                ->color('danger')
                ->label('Hapus Data'),
        ];
    }

    public function calculateFinalScores()
    {
        $service = new UtilityService();
        $service->calculateFinalScores();

        $this->notify('success', 'Nilai akhir berhasil dihitung');
    }

    public function truncateNilaiAkhirsTable()
    {
        $service = new UtilityService();
        $service->truncateNilaiAkhirsTable();

        $this->notify('success', 'Nilai Akhir berhasil dihapus');
    }
}
