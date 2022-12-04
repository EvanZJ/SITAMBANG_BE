<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
