<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berisi extends Model
{
    protected $fillable = [
        'kuantitas',
    ];
    use HasFactory;

    public function Stock(){
        return $this->hasOne(Stock::class);
    }
    public function Pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}
