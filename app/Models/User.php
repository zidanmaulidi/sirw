<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level_users_id',
        'domisilis_id',
        'kependudukan',
        'no_KK',
        'NIK',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'status',
        'profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function level_users(): BelongsTo
    {
        return $this->belongsTo(LevelUser::class, 'level_users_id');
    }

    public function domisilis(): BelongsTo
    {
        return $this->belongsTo(Domisili::class, 'domisilis_id');
    }

    public function informasi(): HasMany
    {
        return $this->hasMany(Informasi::class);
    }

    public function aduan(): HasMany
    {
        return $this->hasMany(Aduan::class);
    }
}
