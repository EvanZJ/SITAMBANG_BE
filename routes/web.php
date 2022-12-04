<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PembeliController;
use Faker\Calculator\Inn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/debug', function () {
    return view('debug');
});
Route::prefix('karyawan')->group(function () {
    Route::get('/login', [KaryawanController::class, 'create'])->name('karyawan.login');
    Route::post('/login', [KaryawanController::class, 'login'])->name('karyawan.login');
    Route::get('/dashboard', [KaryawanController::class, 'dashboard'])->name('karyawan.dashboard');
    Route::post('/logout', [KaryawanController::class, 'logout'])->name('karyawan.logout');
    Route::get('/riwayat-transaksi', [KaryawanController::class, 'riwayatTransaksi'])->name('karyawan.riwayat-transaksi');
    Route::get('/stock', [StockController::class, 'index'])->name('karyawan.stock');
})->middleware(['auth', 'verified', 'karyawan']);


Route::prefix('pembeli')->group(function() {
    Route::get('/dashboard', [PembeliController::class, 'dashboard'])->name('pembeli.dashboard');
    Route::get('/riwayat-transaksi', [PembeliController::class, 'riwayatTransaksi'])->name('pembeli.riwayat-transaksi');
    Route::get('/stock', [StockController::class, 'index'])->name('pembeli.stock');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    if (Auth::guard('web')->check()) {
       return redirect()->route('pembeli.dashboard');
    }
    else if (Auth::guard('karyawan')->check()) {
        return redirect()->route('karyawan.dashboard');
    }
    else{
        return redirect()->route('login');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/pemesanan', [
    PemesananController::class, 'index'
])->middleware(['auth', 'verified'])->name('pemesanan.index');

Route::post('/pilih-pembayaran', [ PemesananController::class, 'pilih_pembayaran'])
->middleware(['auth', 'verified'])->name('pemesanan.pilih_pembayaran');

Route::get('/konfirmasi-pemesanan', function () {
    return Inertia::render('Pemesanan/KonfirmasiPemesanan');
})->middleware(['auth', 'verified'])->name('konfirmasi-pemesanan');

Route::get('/info-pembayaran-bank', function () {
    return Inertia::render('Pemesanan/InfoPembayaranBank');
})->middleware(['auth', 'verified'])->name('info-pembayaran-bank');

Route::get('/info-pembayaran-e-wallet', function () {
    return Inertia::render('Pemesanan/InfoPembayaranEWallet');
})->middleware(['auth', 'verified'])->name('info-pembayaran-e-wallet');

Route::get('/info-pembayaran-tunai', function () {
    return Inertia::render('Pemesanan/InfoPembayaranTunai');
})->middleware(['auth', 'verified'])->name('info-pembayaran-tunai');

Route::get('/pemesanan-berhasil', function () {
    return Inertia::render('Pemesanan/PemesananBerhasil');
})->middleware(['auth', 'verified'])->name('pemesanan-berhasil');



require __DIR__.'/auth.php';
