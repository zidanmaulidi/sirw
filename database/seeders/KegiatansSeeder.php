<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KegiatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kegiatans')->insert([
            [
                'kegiatan' => 'Gotong Royong',
                'waktu' => '2024-06-15',
                'lokasi' => 'Lapangan RT 10',
                'peserta' => 'Seluruh Warga RT 10',
                'agenda' => 'Membersihkan lingkungan sekitar',
            ],
            [
                'kegiatan' => 'Rapat Bulanan',
                'waktu' => '2024-06-20',
                'lokasi' => 'Balai Warga RT 11',
                'peserta' => 'Pengurus RT dan Warga RT 11',
                'agenda' => 'Membahas kegiatan bulan berikutnya',
            ],
            [
                'kegiatan' => 'Senam Pagi',
                'waktu' => '2024-06-22',
                'lokasi' => 'Lapangan RT 10',
                'peserta' => 'Ibu-ibu RT 10',
                'agenda' => 'Senam pagi bersama',
            ],
            [
                'kegiatan' => 'Pengajian Rutin',
                'waktu' => '2024-06-25',
                'lokasi' => 'Masjid RT 11',
                'peserta' => 'Warga RT 11',
                'agenda' => 'Pengajian rutin bulanan',
            ],
            [
                'kegiatan' => 'Lomba 17 Agustus',
                'waktu' => '2024-08-17',
                'lokasi' => 'Lapangan RT 10',
                'peserta' => 'Seluruh Warga RT 10 dan RT 11',
                'agenda' => 'Perlombaan hari kemerdekaan',
            ],
            [
                'kegiatan' => 'Bazar Murah',
                'waktu' => '2024-09-10',
                'lokasi' => 'Lapangan RT 11',
                'peserta' => 'Warga RT 11',
                'agenda' => 'Bazar kebutuhan pokok murah',
            ],
            [
                'kegiatan' => 'Pelatihan Kewirausahaan',
                'waktu' => '2024-10-05',
                'lokasi' => 'Balai Warga RT 10',
                'peserta' => 'Pemuda RT 10',
                'agenda' => 'Pelatihan kewirausahaan untuk pemuda',
            ],
            [
                'kegiatan' => 'Donor Darah',
                'waktu' => '2024-11-12',
                'lokasi' => 'Balai Warga RT 11',
                'peserta' => 'Warga RT 11',
                'agenda' => 'Donor darah bersama',
            ],
            [
                'kegiatan' => 'Kerja Bakti',
                'waktu' => '2024-12-01',
                'lokasi' => 'Lingkungan RT 10 dan RT 11',
                'peserta' => 'Warga RT 10 dan RT 11',
                'agenda' => 'Kerja bakti membersihkan lingkungan',
            ],
            [
                'kegiatan' => 'Perayaan Tahun Baru',
                'waktu' => '2024-12-31',
                'lokasi' => 'Lapangan RT 10',
                'peserta' => 'Seluruh Warga RT 10 dan RT 11',
                'agenda' => 'Perayaan tahun baru',
            ],
        ]);
    }
}
