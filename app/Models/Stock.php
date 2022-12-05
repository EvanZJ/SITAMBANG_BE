<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'name',
        'total_persediaan',
        'harga',
        'description',
    ];

    public function Berisi(){
        return $this->hasMany(berisi::class);
    }
    use HasFactory;
}
