<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    
    protected $fillable  = [
        'id',
        'alternatif',
        'kondisi_rumah',
        'kondisi_air',
        'penghasilan',
        'tegangan_listrik',
        'pendidikan',
        'pekerjaan',
        'sumber_air',
        'bahan_bakar_memasak',
        'umur',
        'tanggungan',       
    ];

    // Mutator untuk atribut 'umur'
    public function getUmurAttribute($value)
    {
        if ($value >= 0 && $value <= 45) {
            return '25';
        } elseif ($value >= 46 && $value <= 50) {
            return '50';
        } elseif ($value >= 51 && $value <= 55) {
            return '75';
        } else {
            return '100';
        }
    }

    // Mutator untuk atribut 'tanggungan'
    public function getTanggunganAttribute($value)
    {
        if ($value >= 0 && $value == 1) {
            return '25';
        } elseif ($value == 2) {
            return '50';
        } elseif ($value == 3) {
            return '75';
        } else {
            return '100';
        }
    }
}
