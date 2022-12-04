<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function create(){
        if (!Auth::guard('karyawan')->check()) {
            return Inertia::render('Auth/LoginKaryawan', [
                'canResetPassword' => Route::has('password.request'),
                'status' => session('status'),
            ]);
        }
        else{
            return redirect()->route('karyawan.dashboard');
        }
    }

    public function login(Request $request){
        if(Auth::guard('karyawan')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('karyawan.dashboard');
        }
        else{
            return redirect()->route('karyawan.login')->with('error', 'Email atau password salah');
        }
    }

    public function logout(){
        Auth::guard('karyawan')->logout();
        return redirect()->route('login');
    }

    public function riwayatTransaksi(){
        if (Auth::guard('karyawan')->check()) {
            return Inertia::render('RiwayatTransaksiKaryawan');
        }
        else{
            return redirect()->route('karyawan.login');
        }
        // dd(json_encode($riwayatTransaksi));
    }

    public function dashboard(){
        if (Auth::guard('karyawan')->check()) {
            return Inertia::render('Dashboard', [
                'isPembeli' => false,
                'isKaryawan' => true,
            ]);
        }
        else{
            return redirect()->route('karyawan.login');
        }
    }

    public function getPagination(){
        if (Auth::guard('karyawan')->check()) {
            $riwayatTransaksi = Riwayat::paginate(10);
            return $riwayatTransaksi;
        }
        else{
            return redirect()->route('karyawan.login');
        }
    }
}
