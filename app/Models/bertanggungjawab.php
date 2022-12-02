<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bertanggungjawab extends Model
{
    protected $fillable = [
    ];
    use HasFactory;

    public function Karyawan(){
        return $this->hasOne(Karyawan::class);
    }
    public function AlatTambak(){
        return $this->hasOne(AlatTambak::class);
    }
}
