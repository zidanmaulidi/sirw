<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('criterias')->insert([
            ['kriteria' => 'Kondisi Rumah', 'kode_kriteria' => 'C1', 'bobot' => 0.15, 'jenis' => 'cost'],
            ['kriteria' => 'Kondisi Air', 'kode_kriteria' => 'C2', 'bobot' => 0.13, 'jenis' => 'cost'],
            ['kriteria' => 'Penghasilan', 'kode_kriteria' => 'C3', 'bobot' => 0.13, 'jenis' => 'cost'],
            ['kriteria' => 'Tegangan Listrik', 'kode_kriteria' => 'C4', 'bobot' => 0.12, 'jenis' => 'cost'],
            ['kriteria' => 'Pendidikan', 'kode_kriteria' => 'C5', 'bobot' => 0.08, 'jenis' => 'cost'],
            ['kriteria' => 'Pekerjaan', 'kode_kriteria' => 'C6', 'bobot' => 0.10, 'jenis' => 'cost'],
            ['kriteria' => 'Sumber Air', 'kode_kriteria' => 'C7', 'bobot' => 0.05, 'jenis' => 'cost'],
            ['kriteria' => 'Bahan Bakar Memasak', 'kode_kriteria' => 'C8', 'bobot' => 0.05, 'jenis' => 'cost'],
            ['kriteria' => 'Umur', 'kode_kriteria' => 'C9', 'bobot' => 0.08, 'jenis' => 'benefit'],
            ['kriteria' => 'Tanggungan', 'kode_kriteria' => 'C10', 'bobot' => 0.10, 'jenis' => 'benefit'],
        ]);
        
    }
}
