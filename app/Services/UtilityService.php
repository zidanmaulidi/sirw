<?php

namespace App\Services;

use App\Models\Utiliti;
use App\Models\Rangking;
use App\Models\Alternatif;
use App\Models\NilaiAkhir;
use Illuminate\Support\Facades\DB;

class UtilityService
{
    public function calculateAndFillUtilities()
    {
        $alternatifs = Alternatif::all();

        $min = ['kondisi_rumah' => 50, 'kondisi_air' => 50, 'penghasilan' => 50, 'tegangan_listrik' => 75, 'pendidikan' => 25, 'pekerjaan' => 40, 'sumber_air' => 50, 'bahan_bakar_memasak' => 50,'umur' => 25, 'tanggungan' => 25];
        $max = ['kondisi_rumah' => 100, 'kondisi_air' => 100, 'penghasilan' => 100, 'tegangan_listrik' => 100, 'pendidikan' => 100, 'pekerjaan' => 100, 'sumber_air' => 100, 'bahan_bakar_memasak' => 100,'umur' => 100, 'tanggungan' => 100 ];
    
        $costCriteria = ['kondisi_rumah', 'kondisi_air', 'penghasilan', 'tegangan_listrik', 'pendidikan', 'pekerjaan', 'sumber_air', 'bahan_bakar_memasak'];
        $benefitCriteria = ['umur', 'tanggungan'];

        foreach ($alternatifs as $alternatif) {
            $utility = Utiliti::updateOrCreate(
                ['alternatif' => $alternatif->alternatif],
                []
            );

            foreach ($costCriteria as $criteria) {
                $utility->$criteria = $this->calculateCostUtility($alternatif->$criteria, $min[$criteria], $max[$criteria]);
            }

            foreach ($benefitCriteria as $criteria) {
                $utility->$criteria = $this->calculateBenefitUtility($alternatif->$criteria, $min[$criteria], $max[$criteria]);
            }

            $utility->save();
        }
    }

    private function calculateCostUtility($value, $min, $max)
    {
        return (($max - $value) / ($max - $min));
    }
            
    private function calculateBenefitUtility($value, $min, $max)
    {
        return (($value - $min) / ($max - $min));
    }

    // fungsi mengosongkan data utiliti
    public function truncateUtilitiesTable()
    {
        DB::table('utilitis')->truncate();
    }

    public function calculateFinalScores()
    {
        // Ambil data utiliti dari tabel utilitis
        $utilities = DB::table('utilitis')->get();

        // Bobot kriteria dengan nama asli
        $weights = [
            'kondisi_rumah' => 0.15,
            'kondisi_air' => 0.13,
            'penghasilan' => 0.13,
            'tegangan_listrik' => 0.12,
            'pendidikan' => 0.08,
            'pekerjaan' => 0.10,
            'sumber_air' => 0.05,
            'bahan_bakar_memasak' => 0.05,
            'umur' => 0.08,
            'tanggungan' => 0.10,
        ];

        // Hapus data sebelumnya di tabel nilai_akhirs
        NilaiAkhir::truncate();

        // Hitung nilai akhir dan simpan ke tabel nilai_akhirs
        foreach ($utilities as $utility) {
            $finalScores = [
                'alternatif' => $utility->alternatif,
                'kondisi_rumah' => $utility->kondisi_rumah * $weights['kondisi_rumah'],
                'kondisi_air' => $utility->kondisi_air * $weights['kondisi_air'],
                'penghasilan' => $utility->penghasilan * $weights['penghasilan'],
                'tegangan_listrik' => $utility->tegangan_listrik * $weights['tegangan_listrik'],
                'pendidikan' => $utility->pendidikan * $weights['pendidikan'],
                'pekerjaan' => $utility->pekerjaan * $weights['pekerjaan'],
                'sumber_air' => $utility->sumber_air * $weights['sumber_air'],
                'bahan_bakar_memasak' => $utility->bahan_bakar_memasak * $weights['bahan_bakar_memasak'],
                'umur' => $utility->umur * $weights['umur'],
                'tanggungan' => $utility->tanggungan * $weights['tanggungan'],
            ];

            // Hitung skor total
            $finalScores['total_score'] = array_sum(array_slice($finalScores, 1));

            NilaiAkhir::create($finalScores);

            // NilaiAkhir::create($finalScores);
        }
        
    }

    // rumus perangkingan
    public function calculateRankings()
    {
        // Ambil data nilai akhir
        $finalScores = NilaiAkhir::all();

        // Hapus data sebelumnya di tabel rangkings
        Rangking::truncate();

        // Buat array untuk menyimpan skor total tiap alternatif
        $scores = [];

        foreach ($finalScores as $score) {
            $scores[] = [
                'alternatif' => $score->alternatif,
                'skor' => $score->total_score,
            ];
        }

        // Urutkan berdasarkan skor total (descending)
        usort($scores, function($a, $b) {
            return $b['skor'] <=> $a['skor'];
        });

        // Simpan ranking ke tabel rangkings
        foreach ($scores as $index => $score) {
            Rangking::create([
                'alternatif' => $score['alternatif'],
                'skor' => $score['skor'],
                'rangking' => $index + 1, // Ranking dimulai dari 1
            ]);
        }
    }
    
}

// namespace App\Services;

// use App\Models\Alternatif;
// use App\Models\Utiliti;

// class UtilityService
// {
//     public function calculateAndFillUtilities()
//     {
//         $alternatifs = Alternatif::all();

//         // Initialize min and max arrays
//         $min = [50,50,50,75,25,40,50,50,25,25];
//         $max = [100,100,100,100,100,100,100,100,100,100];

//         foreach ($alternatifs as $alternatif) {
//             foreach ($alternatif->getAttributes() as $key => $value) {
//                 if ($key !== 'id' && $key !== 'alternatif' && $key !== 'created_at' && $key !== 'updated_at') {
//                     if (!isset($min[$key]) || $value < $min[$key]) {
//                         $min[$key] = $value;
//                     }
//                     if (!isset($max[$key]) || $value > $max[$key]) {
//                         $max[$key] = $value;
//                     }
//                 }
//             }
//         }

//         // Define criteria types
//         $costCriteria = ['kondisi_rumah', 'kondisi_air', 'penghasilan', 'tegangan_listrik', 'pendidikan', 'pekerjaan', 'sumber_air', 'bahan_bakar_memasak'];
//         $benefitCriteria = ['umur', 'tanggungan'];

//         foreach ($alternatifs as $alternatif) {
//             $utility = Utiliti::updateOrCreate(
//                 ['alternatif' => $alternatif->alternatif],
//                 []
//             );

//             foreach ($costCriteria as $criteria) {
//                 $utility->$criteria = $this->calculateCostUtility($alternatif->$criteria, $min[$criteria], $max[$criteria]);
//             }

//             foreach ($benefitCriteria as $criteria) {
//                 $utility->$criteria = $this->calculateBenefitUtility($alternatif->$criteria, $min[$criteria], $max[$criteria]);
//             }

//             $utility->save();
//         }
//     }

//     private function calculateCostUtility($value, $min, $max)
//     {
//         return (($max - $value) / ($max - $min)) * 100;
//     }

//     private function calculateBenefitUtility($value, $min, $max)
//     {
//         return (($value - $min) / ($max - $min)) * 100;
//     }
// }

// namespace App\Services;

// use App\Models\Alternatif;
// use App\Models\Utiliti;

// class UtilityService
// {
//     public function calculateAndFillUtilities()
//     {
//         $alternatifs = Alternatif::all();

//         $key = ['kondisi_rumah', 'kondisi_air', 'penghasilan', 'tegangan_listrik', 'pendidikan', 'pekerjaan', 'sumber_air', 'bahan_bakar_memasak'];
//         $key = ['umur', 'tanggungan'];

//         // Inisialisasi min dan max array sesuai dengan data yang diberikan
//         $min = [50, 50, 50, 75, 25, 40, 50, 50, 25, 25];
//         $max = [100, 100, 100, 100, 100, 100, 100, 100, 100, 100];

//         foreach ($alternatifs as $alternatif) {
//             $utility = Utiliti::updateOrCreate(
//                 ['alternatif' => $alternatif->alternatif],
//                 []
//             );

//             // Hitung utilitas untuk setiap kriteria sesuai dengan jenis kriteria
//             foreach ($alternatif->getAttributes() as $key => $value) {
//                 if ($key !== 'id' && $key !== 'alternatif' && $key !== 'created_at' && $key !== 'updated_at') {
//                     // Tentukan jenis kriteria berdasarkan nama kolom
//                     $jenis = 'cost';
//                     if ($key === 'umur' || $key === 'tanggungan') {
//                         $jenis = 'benefit';
//                     }

//                     // Hitung utilitas berdasarkan jenis kriteria
//                     if ($jenis === 'cost') {
//                         $utility->$key = $this->calculateCostUtility($value, $min[$key], $max[$key]);
//                     } else {
//                         $utility->$key = $this->calculateBenefitUtility($value, $min[$key], $max[$key]);
//                     }
//                 }
//             }

//             $utility->save();
//         }
//     }

//     private function calculateCostUtility($value, $min, $max)
//     {
//         return (($max - $value) / ($max - $min)) * 100;
//     }

//     private function calculateBenefitUtility($value, $min, $max)
//     {
//         return (($value - $min) / ($max - $min)) * 100;
//     }
// }

