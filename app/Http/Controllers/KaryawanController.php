<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Karyawan;
use App\Models\Karyawan as ModelsKaryawan;
use App\Models\Pemesanan;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $request->session()->regenerate();
            return redirect()->route('karyawan.dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::guard('karyawan')->logout();
        return redirect()->route('login');
    }

    public function riwayatTransaksi(){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            return Inertia::render('RiwayatTransaksi', [
                'isPembeli' => false,
                'isKaryawan' => true,
                'isAdmin' => $isAdmin,
                'token' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }
        // dd(json_encode($riwayatTransaksi));
    }

    public function dashboard(){
        if (Auth::guard('karyawan')->check()) {
            return Inertia::render('Dashboard', [
                'isPembeli' => false,
                'isKaryawan' => true,
                'token' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function getPagination(){
        if (Auth::guard('karyawan')->check()) {
            $riwayatTransaksi = Pemesanan::paginate(10);
            return $riwayatTransaksi;
        }
        else{
            return redirect()->route('login');
        }
    }

    public function getPaginationKaryawan(){
        if (Auth::guard('karyawan')->check()) {
            $karyawawan = ModelsKaryawan::paginate(10);
            return $karyawawan;
        }
        else{
            return redirect()->route('login');
        }
    }

    public function index(){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            return Inertia::render('KaryawanList', [
                'isAdmin' => $isAdmin,
                'csrf' => csrf_token(),
                'token' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function createKaryawan(){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                return Inertia::render('TambahKaryawan', [
                    'csrf' => csrf_token(),
                    'token' => csrf_token(),
                ]);
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function storeKaryawan(Request $req){
        try{
            $this->validate($req, [
                'nama' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_lahir' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jabatan' => 'required',
            ]);
        }
        catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('karyawan.createKaryawan')->with('error', 'Data tidak valid');
        }
        $karyawawan = ModelsKaryawan::create([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'jenis_kelamin' => $req->jenis_kelamin,
            'is_admin' => false,
            'tanggal_lahir' => $req->tanggal_lahir,
            'tempat_lahir' => $req->tempat_lahir,
            'alamat' => $req->alamat,
            'no_telp' => $req->no_hp,
            'jabatan' => $req->jabatan,
        ]);
        return redirect()->route('karyawan.index');
    }

    public function editKaryawan($id){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $karyawan = ModelsKaryawan::find($id);
                return Inertia::render('EditKaryawan', [
                    'csrf' => csrf_token(),
                    'karyawan' => $karyawan,
                    'token' => csrf_token(),
                ]);
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function updateKaryawan(Request $req){
        try{
            $this->validate($req, [
                'nama' => 'required',
                'email' => 'required|email',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_lahir' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jabatan' => 'required',
            ]);
        }
        catch(\Illuminate\Validation\ValidationException $e){
            dd($e);
            return redirect()->route('karyawan.editKaryawan', ['id' => $req->id])->with('error', 'Data tidak valid');
        }
        $karyawan = ModelsKaryawan::find($req->id);
        $karyawan->name = $req->nama;
        $karyawan->email = $req->email;
        $karyawan->jenis_kelamin = $req->jenis_kelamin;
        $karyawan->tanggal_lahir = $req->tanggal_lahir;
        $karyawan->tempat_lahir = $req->tempat_lahir;
        $karyawan->alamat = $req->alamat;
        $karyawan->no_telp = $req->no_hp;
        $karyawan->jabatan = $req->jabatan;
        $karyawan->save();
        return redirect()->route('karyawan.index');
    }

    public function detailTransaksi(Request $request){
        if (Auth::guard('karyawan')->check()) {
            $data = Pemesanan::where('id', $request->id)->get();
            $product = $data[0]->Berisi()->get();
            $list_product = [];
            foreach ($product as $p){
                $list_product[] = $p->Stock()->get()[0];
            }
            $nama = $data[0]->User()->get()[0];
            return Inertia::render('DetailTransaksi', [
                'data' => $data,
                'product' => $product,
                'list_product' => $list_product,
                'nama' => $nama,
                'isKaryawan' => true,
                'isPembeli' => false,
                'token' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }

    }

    public function destroyKaryawan(Request $id){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $karyawan = ModelsKaryawan::find($id->id);
                $karyawan->delete();
                return redirect()->route('karyawan.index');
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function indexPembeli(){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $pembeli = User::all();
                return Inertia::render('PembeliList', [
                    'pembeli' => $pembeli,
                    'isAdmin' => $isAdmin,
                    'csrf' => csrf_token(),
                    'token' => csrf_token(),
                ]);
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function getPaginationPembeli(){
        if (Auth::guard('karyawan')->check()) {
            $pembeli = User::paginate(10);
            return $pembeli;
        }
        else{
            return redirect()->route('login');
        }
        
    }

    public function editPembeli($id){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $pembeli = User::find($id);
                // dd($pembeli);
                return Inertia::render('EditPembeli', [
                    'csrf' => csrf_token(),
                    'pembeli' => $pembeli,
                    'token' => csrf_token(),
                ]);
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function pemesanan(Request $id){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $pemesanan = Pemesanan::where('id', $id->id)->get();
                $product = $pemesanan[0]->Berisi()->get();
                $list_product = [];
                foreach ($product as $p){
                    $list_product[] = $p->Stock()->get()[0];
                }
                $nama = $pemesanan[0]->User()->get()[0];
                dd($pemesanan, $product, $list_product, $nama);
                return Inertia::render('DetailTransaksi', [
                    'data' => $pemesanan,
                    'product' => $product,
                    'list_product' => $list_product,
                    'nama' => $nama,
                    'isKaryawan' => true,
                    'isPembeli' => false,
                    'token' => csrf_token(),
                ]);
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function deletePemesanan($id){
        if (Auth::guard('karyawan')->check()) {
            $isAdmin = Auth::guard('karyawan')->user()->is_admin;
            if($isAdmin){
                $pemesanan = Pemesanan::find($id);
                $pemesanan->delete();
                return redirect()->route('karyawan.riwayat-transaksi');
            }
            else{
                return redirect()->route('karyawan.dashboard');
            }
        }
        else{
            return redirect()->route('login');
        }
    }
}
