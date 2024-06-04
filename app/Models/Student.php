<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'image', 'nama', 'fakultas'];

    // Mutator untuk atribut 'umur'
    public function getNamaAttribute($value)
    {
        if ($value >= 1 && $value <= 15) {
            return 'Remaja';
        } elseif ($value >= 16 && $value <= 20) {
            return 'Dewasa';
        } else {
            return 'Orang Tua';
        }
    }

}
