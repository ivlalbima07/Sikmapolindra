<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // Import HasRoles trait

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
        'phone_number',
        'password',
        // 'role' -> Tidak diperlukan dalam fillable, roles di-handle oleh spatie
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
    ];

    /**
     * Relasi ke Dudi (contoh relasi 1-to-many)
     */
    public function dudis()
    {
        return $this->hasMany(Dudi::class, 'user_id');
    }

    /**
     * Cek apakah pengguna adalah super-admin
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin'); // Memeriksa role menggunakan spatie
    }
}