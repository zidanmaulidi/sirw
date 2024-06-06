<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeuangansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('keuangans')->insert([
            [
                'tanggal' => '2024-06-01',
                'keterangan' => 'Iuran Bulanan Warga RT 10',
                'uang_masuk' => 500000,
                'uang_keluar' => 0,
                
            ],
            [
                'tanggal' => '2024-06-05',
                'keterangan' => 'Pembayaran Listrik Balai Warga RT 10',
                'uang_masuk' => 0,
                'uang_keluar' => 200000,
                
            ],
            [
                'tanggal' => '2024-06-10',
                'keterangan' => 'Iuran Bulanan Warga RT 11',
                'uang_masuk' => 550000,
                'uang_keluar' => 0,
                
            ],
            [
                'tanggal' => '2024-06-15',
                'keterangan' => 'Pembelian Alat Kebersihan',
                'uang_masuk' => 0,
                'uang_keluar' => 150000,
                
            ],
            [
                'tanggal' => '2024-06-20',
                'keterangan' => 'Donasi Warga untuk Kegiatan 17 Agustus',
                'uang_masuk' => 300000,
                'uang_keluar' => 0,
                
            ],
            [
                'tanggal' => '2024-06-25',
                'keterangan' => 'Biaya Konsumsi Rapat RT 10',
                'uang_masuk' => 0,
                'uang_keluar' => 100000,
                
            ],
            [
                'tanggal' => '2024-06-30',
                'keterangan' => 'Pemasukan dari Bazar Murah',
                'uang_masuk' => 250000,
                'uang_keluar' => 0,
                
            ],
            [
                'tanggal' => '2024-07-05',
                'keterangan' => 'Pembelian Bendera Merah Putih',
                'uang_masuk' => 0,
                'uang_keluar' => 50000,
                
            ],
            [
                'tanggal' => '2024-07-10',
                'keterangan' => 'Iuran Bulanan Warga RT 10',
                'uang_masuk' => 500000,
                'uang_keluar' => 0,
                
            ],
            [
                'tanggal' => '2024-07-15',
                'keterangan' => 'Pembayaran Listrik Balai Warga RT 11',
                'uang_masuk' => 0,
                'uang_keluar' => 200000,
                
            ],
        ]);
    }
}
