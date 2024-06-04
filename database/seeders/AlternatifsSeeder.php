<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternatifsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('alternatifs')->insert([
            [
                'alternatif' => 'budi',
                'kondisi_rumah' => 50,
                'kondisi_air' => 50,
                'penghasilan' => 50,
                'tegangan_listrik' => 75,
                'pendidikan' => 50,
                'pekerjaan' => 60,
                'sumber_air' => 100,
                'bahan_bakar_memasak' => 100,
                'umur' => 35,
                'tanggungan' => 1,
            ],
            [
                'alternatif' => 'sulastri',
                'kondisi_rumah' => 100,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 100,
                'pekerjaan' => 80,
                'sumberair' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 60,
                'tanggungan' => 2,
            ],
            [
                'alternatif' => 'samino',
                'kondisi_rumah' => 50,
                'kondisi_air' => 50,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 75,
                'pekerjaan' => 100,
                'sumber_air' => 100,
                'bahan_bakar_memasak' => 50,
                'umur' => 51,
                'tanggungan' => 4,
            ],
            [
                'alternatif' => 'supardi',
                'kondisi_rumah' => 100,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 100,
                'pekerjaan' => 80,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 57,
                'tanggungan' => 3,
            ],
            [
                'alternatif' => 'khotib',
                'kondisi_rumah' => 50,
                'kondisi_air' => 50,
                'penghasilan' => 50,
                'tegangan_listrik' => 100,
                'pendidikan' => 50,
                'pekerjaan' => 60,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 47,
                'tanggungan' => 2,
            ],
            [
                'alternatif' => 'subandi',
                'kondisi_rumah' => '100',
                'kondisi_air' => '100',
                'penghasilan' => '75',
                'tegangan_listrik' => '100',
                'pendidikan' => '100',
                'pekerjaan' => '60',
                'sumber_air' => '100',
                'bahan_bakar_memasak' => '50',
                'umur' => 50,
                'tanggungan' => 3,
            ],
            [
                'alternatif' => 'suharno',
                'kondisi_rumah' => 100 ,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 75,
                'pendidikan' => 75,
                'pekerjaan' => 100,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 46,
                'tanggungan' => 6,
            ],
            [
                'alternatif' => 'soleh',
                'kondisi_rumah' => 50,
                'kondisi_air' => 50,
                'penghasilan' => 50,
                'tegangan_listrik' => 100,
                'pendidikan' => 25,
                'pekerjaan' => 40,
                'sumber_air' => 100,
                'bahan_bakar_memasak' =>  50,
                'umur' => 46,
                'tanggungan' => 2,
            ],
            [
                'alternatif' => 'eko',
                'kondisi_rumah' => 50,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 75,
                'pekerjaan' => 100,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 43,
                'tanggungan' => 5,
            ],
            [
                'alternatif' => 'suroso',
                'kondisi_rumah' => 50,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 75,
                'pekerjaan' => 80,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 52,
                'tanggungan' => 4,
            ],
        ]);
    }
}
