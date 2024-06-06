<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aduan extends Model
{
    use HasFactory;

    protected $fillable  = [
        'nama_pengadu',
        'aduan',
        'isi_aduan',
        'bukti',
    ];

}
