<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function create(){
        return Inertia::render('Auth/LoginKaryawan', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    public function login(Request $request){
        if(Auth::guard('karyawan')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        else{
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }

    public function logout(){
        Auth::guard('karyawan')->logout();
        return redirect()->route('login');
    }
}
