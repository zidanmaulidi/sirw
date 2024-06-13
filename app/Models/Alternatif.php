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

}
