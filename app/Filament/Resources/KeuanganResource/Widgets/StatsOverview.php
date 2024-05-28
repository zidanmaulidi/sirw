<?php

namespace App\Filament\Resources\KeuanganResource\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    protected function getCards(): array
    {
        // Menghitung jumlah uang masuk
        $uangMasuk = Keuangan::sum('uang_masuk');

        // Menghitung jumlah uang keluar
        $uangKeluar = Keuangan::sum('uang_keluar');

        // Ambil entri terakhir dari tabel Keuangan
        $latestRecord = Keuangan::latest()->first();

        // Jika tidak ada entri, saldo kas diatur menjadi 0, jika ada, ambil saldo terakhir
        $saldoKas = $latestRecord ? $latestRecord->saldo_kas : 0;

        return [
            Card::make('Uang Masuk', $uangMasuk)
            ->description('total masuk kas')
            ->descriptionIcon('heroicon-o-trending-down'),
            Card::make('Uang Keluar', $uangKeluar)
            ->description('total keluar kas')
            ->descriptionIcon('heroicon-o-trending-up'),
            Card::make('Saldo Kas', $saldoKas)
            ->description('total kas saat ini')
            ->descriptionIcon('heroicon-o-cash'),
        ];
    }    
}
