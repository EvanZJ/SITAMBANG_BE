<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Riwayat;

class PembeliController extends Controller
{
    public function dashboard(){
        if (Auth::guard('web')->check()) {
            return Inertia::render('Dashboard', [
                'isPembeli' => true,
                'isKaryawan' => false,
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function riwayatTransaksi(){
        if (Auth::guard('web')->check()) {
            return Inertia::render('RiwayatTransaksiPembeli');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function getPagination(){
        if (Auth::guard('web')->check()) {
            $riwayatTransaksi = Pemesanan::where('user_id', Auth::user()->id)->paginate(10);
            return $riwayatTransaksi;
        }
        else{
            return redirect()->route('login');
        }
    }
}
