<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Karyawan extends Authenticatable
{
    protected $guard = 'karyawan';

    protected $fillable = [
        'name',
        'no_telp',
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'password',
        'jabatan',
        'is_admin',
        'status',
    ];

    protected $hidden = [
        'is_admin',
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
    use HasApiTokens, HasFactory, Notifiable;
    public function AlatTambak(){
        return $this->hasMany(AlatTambak::class);
    }
    
}
