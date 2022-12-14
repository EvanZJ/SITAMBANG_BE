<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berisi extends Model
{
    protected $fillable = [
        'kuantitas',
        'pemesanan_id',
        'stock_id',
    ];
    use HasFactory;

    public function Stock(){
        return $this->belongsTo(Stock::class);
    }
    public function Pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }
}
