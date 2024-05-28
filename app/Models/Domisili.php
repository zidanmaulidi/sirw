<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domisili extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'domisili',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'domisilis_id');
    }
}
