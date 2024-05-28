<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LevelUser extends Model
{
    use HasFactory;

    protected $table = "level_users";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'level_kode',
        'level_nama',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'level_users_id');
    }
}
