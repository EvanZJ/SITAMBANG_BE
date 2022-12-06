<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'totalPembayaran',
        'caraPembayaran',
        'user_id',
        'status',
        'karyawan_id',
        'bukti_path',
        'verified_at'
    ];
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Riwayat(){
        return $this->hasOne(Riwayat::class);
    }

    public function Karyawan(){
        return $this->belongsTo(Karyawan::class);
    }

    public function Berisi(){
        return $this->hasMany(Berisi::class);
    }

    // percobaan avin
    protected $table='pemesanans';

}
