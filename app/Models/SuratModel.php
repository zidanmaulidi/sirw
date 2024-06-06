<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    use HasFactory;
    protected $table = "pengajuansurat";
    protected $primaryKey = "id";
    protected $fillable  = [
        'nama_pengaju',
        'NIK',
        'tempat_lahir',
        'tgl_lahir',
        'pekerjaan',
        'status',
        'alamat',
        'keperluan',
    ];
}