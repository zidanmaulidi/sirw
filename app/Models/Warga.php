<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warga extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'no_KK',
        'NIK',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'status',
        'domisilis_id',
        'kependudukan',
        'profile',
    ];

    public function domisilis(): BelongsTo
    {
        return $this->belongsTo(Domisili::class, 'domisilis_id');
    }
}
