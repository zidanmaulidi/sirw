<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable  = [
        'tanggal',
        'keterangan',
        'uang_masuk',
        'uang_keluar',
        'saldo_kas',
    ];  

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Ambil saldo terakhir berdasarkan tanggal
            $previousRecord = static::orderBy('tanggal', 'desc')->first();
            $previousSaldo = $previousRecord ? $previousRecord->saldo_kas : 0;

            // Hitung saldo baru
            $model->saldo_kas = $previousSaldo + $model->uang_masuk - $model->uang_keluar;
        });
    }
}
