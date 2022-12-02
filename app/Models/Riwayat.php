<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = [
        'date',
        'total',
    ];
    use HasFactory;

    public function Pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }
}
