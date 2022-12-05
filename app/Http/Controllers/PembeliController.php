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

    public function detail(Request $request){
        if(Auth::guard('web')->check()){
            $data = Pemesanan::where('id', $request->id)->get();
            $product = $data[0]->Berisi()->get();
            $list_product = [];
            foreach ($product as $p){
                $list_product[] = $p->Stock()->get()[0];
            }
            $nama = $data[0]->User()->get()[0];
            // dd($product, $list_product, $data);
            return Inertia::render('DetailTransaksi',[
                'data' => $data,
                'product' => $product,
                'list_product' => $list_product,
                'nama' => $nama,
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }
}
