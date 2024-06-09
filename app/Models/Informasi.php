<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable  = [
        'title',
        'content',
        'thumbnail',
        'users_id'
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // // Fungsi untuk menyimpan ID pengguna saat membuat informasi
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($informasis) {
    //         // Ambil ID pengguna yang saat ini masuk
    //         $loggedInUserId = Auth::id();
            
    //         // Tetapkan ID pengguna saat ini ke Informasi yang akan dibuat
    //         $informasis->users_id = $loggedInUserId;
    //     });
    // }

    
}
