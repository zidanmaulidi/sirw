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
        'aduan',
        'isi_aduan',
        'bukti',
        'tanggapan',
        'users_id',
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Fungsi untuk menyimpan ID pengguna saat membuat aduan
    public static function boot()
    {
        parent::boot();

        static::creating(function ($aduans) {
            // Ambil ID pengguna yang saat ini masuk
            $loggedInUserId = Auth::id();
            
            // Tetapkan ID pengguna saat ini ke aduan yang akan dibuat
            $aduans->users_id = $loggedInUserId;
        });
    }
}
