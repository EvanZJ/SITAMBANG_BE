<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatTambak extends Model
{
    public function Karyawan(){
        return $this->belongsTo(Karyawan::class);
    }
    use HasFactory;
}
