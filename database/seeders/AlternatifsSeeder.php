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
                'umur' => 25,
                'tanggungan' => 25,
            ],
            [
                'alternatif' => 'sulastri',
                'kondisi_rumah' => 100,
                'kondisi_air' => 100,
                'penghasilan' => 100,
                'tegangan_listrik' => 100,
                'pendidikan' => 100,
                'pekerjaan' => 80,
                'sumberair' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 100,
                'tanggungan' => 50,
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
                'bahan_bakar_memasak' => 100,
                'umur' => 75,
                'tanggungan' => 100,
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
                'bahan_bakar_memasak' => 50,
                'umur' => 100,
                'tanggungan' => 75,
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
                'bahan_bakar_memasak' => 50,
                'umur' => 50,
                'tanggungan' => 50,
            ],
            [
                'alternatif' => 'subandi',
                'kondisi_rumah' => 100,
                'kondisi_air' => 100,
                'penghasilan' => 75,
                'tegangan_listrik' => 100,
                'pendidikan' => 100,
                'pekerjaan' => 60,
                'sumber_air' => 100,
                'bahan_bakar_memasak' => 50,
                'umur' => 50,
                'tanggungan' => 75,
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
                'bahan_bakar_memasak' => 50,
                'umur' => 50,
                'tanggungan' => 100,
            ],
            [
                'alternatif' => 'soleh',
                'kondisi_rumah' => 50,
                'kondisi_air' => 50,
                'penghasilan' => 50,
                'tegangan_listrik' => 100,
                'pendidikan' => 25,
                'pekerjaan' => 40,
                'sumber_air' => 50,
                'bahan_bakar_memasak' =>  100,
                'umur' => 50,
                'tanggungan' => 50,
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
                'bahan_bakar_memasak' => 50,
                'umur' => 25,
                'tanggungan' => 100,
            ],
            [
                'alternatif' => 'suroso',
                'kondisi_rumah' => 50,
                'kondisi_air' => 100,
                'penghasilan' => 100,
                'tegangan_listrik' => 100,
                'pendidikan' => 75,
                'pekerjaan' => 80,
                'sumber_air' => 50,
                'bahan_bakar_memasak' => 100,
                'umur' => 75,
                'tanggungan' => 100,
            ],
        ]);
    }
}
