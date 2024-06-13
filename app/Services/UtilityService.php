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
    
        $min = [
            'kondisi_rumah' => Alternatif::min('kondisi_rumah'), 
            'kondisi_air' => Alternatif::min('kondisi_air'), 
            'penghasilan' => Alternatif::min('penghasilan'), 
            'tegangan_listrik' => Alternatif::min('tegangan_listrik'), 
            'pendidikan' => Alternatif::min('pendidikan'), 
            'pekerjaan' => Alternatif::min('pekerjaan'), 
            'sumber_air' => Alternatif::min('sumber_air'), 
            'bahan_bakar_memasak' => Alternatif::min('bahan_bakar_memasak'),
            'umur' => Alternatif::min('umur'), 
            'tanggungan' => Alternatif::min('tanggungan')
        ];
        $max = [
            'kondisi_rumah' => Alternatif::max('kondisi_rumah'), 
            'kondisi_air' => Alternatif::max('kondisi_air'), 
            'penghasilan' => Alternatif::max('penghasilan'), 
            'tegangan_listrik' => Alternatif::max('tegangan_listrik'), 
            'pendidikan' => Alternatif::max('pendidikan'), 
            'pekerjaan' => Alternatif::max('pekerjaan'), 
            'sumber_air' => Alternatif::max('sumber_air'), 
            'bahan_bakar_memasak' => Alternatif::max('bahan_bakar_memasak'),
            'umur' => Alternatif::max('umur'), 
            'tanggungan' => Alternatif::max('tanggungan')
        ];

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
        // return (($max - $value) / ($max - $min));
        return (($value - $min) / ($max - $min));
    }
            
    private function calculateBenefitUtility($value, $min, $max)
    {
        // return (($value - $min) / ($max - $min));
        return (($max - $value) / ($max - $min));
    }

    // fungsi mengosongkan data utiliti
    public function truncateUtilitiesTable()
    {
        DB::table('utilitis')->truncate();
    }

    // fungsi mengosongkan data alternatif
    public function truncateAlternatifsTable()
    {
        DB::table('alternatifs')->truncate();
    }

    // fungsi mengosongkan data nilai akhir
    public function truncateNilaiAkhirsTable()
    {
        DB::table('nilai_akhirs')->truncate();
    }

    // fungsi mengosongkan data rangking
    public function truncateRankingsTable()
    {
        DB::table('rangkings')->truncate();
    }

    // fungsi menghitung final score
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

    // fungsi menjalankan semua fungsi
    public function calculateLangsungRankings(){
        $this->truncateUtilitiesTable();
        $this->truncateNilaiAkhirsTable();
        $this->truncateRankingsTable();
        $this->calculateAndFillUtilities();
        $this->calculateFinalScores();
        $this->calculateRankings();
    }
    
}

