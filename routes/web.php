<?php

use App\Http\Controllers\AlatTambakController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use Faker\Calculator\Inn;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PembeliController;
use App\Models\Pemesanan;
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
    Route::get('/detail/{id}', [KaryawanController::class, 'detailTransaksi'])->name('karyawan.detail-transaksi');
    Route::get('/get-pagination', [KaryawanController::class, 'getPagination'])->name('karyawan.get-pagination');
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
    Route::post('/stock/create', [StockController::class, 'store'])->name('stock.store');
    Route::get('/stock/edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
    Route::post('/stock/edit/{id}', [StockController::class, 'update'])->name('stock.update');
    Route::post('/stock/delete/{id}', [StockController::class, 'destroy'])->name('stock.delete');
    Route::get('/alat', [AlatTambakController::class, 'index'])->name('alat.index');
    Route::get('/alat/create', [AlatTambakController::class, 'create'])->name('alat.create');
    Route::post('/alat/create', [AlatTambakController::class, 'store'])->name('alat.store');
    Route::get('/alat/edit/{id}', [AlatTambakController::class, 'edit'])->name('alat.edit');
    Route::post('/alat/edit/{id}', [AlatTambakController::class, 'update'])->name('alat.update');
    Route::post('/alat/delete/{id}', [AlatTambakController::class, 'destroy'])->name('alat.delete');
    Route::get('/data/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/get-pagination/karyawan', [KaryawanController::class, 'getPaginationKaryawan'])->name('karyawan.get-pagination-karyawan');
    Route::get('/data/karyawan/create', [KaryawanController::class, 'createKaryawan'])->name('karyawan.create');
    Route::post('/data/karyawan/create', [KaryawanController::class, 'storeKaryawan'])->name('karyawan.store');
    Route::get('/data/karyawan/edit/{id}', [KaryawanController::class, 'editKaryawan'])->name('karyawan.edit');
    Route::post('/data/karyawan/edit/{id}', [KaryawanController::class, 'updateKaryawan'])->name('karyawan.update');
    Route::post('/data/karyawan/delete/{id}', [KaryawanController::class, 'destroyKaryawan'])->name('karyawan.delete');
    Route::get('/data/pembeli', [KaryawanController::class, 'indexPembeli'])->name('pembeli.index');
    Route::get('/get-pagination/pembeli', [KaryawanController::class, 'getPaginationPembeli'])->name('pembeli.get-pagination-pembeli');
    Route::get('/data/pembeli/edit/{id}', [KaryawanController::class, 'editPembeli'])->name('pembeli.edit');
    Route::post('/data/pembeli/edit/{id}', [KaryawanController::class, 'updatePembeli'])->name('pembeli.update');
    Route::post('/data/pembeli/delete/{id}', [KaryawanController::class, 'destroyPembeli'])->name('pembeli.delete');
    Route::get('/verifikasi', [PemesananController::class, 'verifikasi'])->name('verifikasi.index');
    Route::get('/verifikasi/get-pagination', [PemesananController::class, 'verifikasiPagination'])->name('verifikasi.get-pagination');
    Route::get('/verifikasi/{id}', [PemesananController::class, 'detailVerifikasi'])->name('verifikasi.detail');
    Route::post('/verifikasi/{id}', [PemesananController::class, 'verify'])->name('verifikasi.verify');
    
})->middleware(['auth', 'verified', 'karyawan']);


Route::prefix('pembeli')->group(function() {
    Route::get('/dashboard', [PembeliController::class, 'dashboard'])->name('pembeli.dashboard');
    Route::get('/riwayat-transaksi', [PembeliController::class, 'riwayatTransaksi'])->name('pembeli.riwayat-transaksi');
    Route::get('/get-pagination', [PembeliController::class, 'getPagination'])->name('pembeli.get-pagination');
    Route::get('/stock', [StockController::class, 'index'])->name('pembeli.stock');
    Route::get('/detail/{id}', [PembeliController::class, 'detail'])->name('pembeli.detail');
    
    Route::get('/pemesanan', [ PemesananController::class, 'index'])->name('pemesanan.index');
    
    Route::post('/proses-pemesanan', [ PemesananController::class, 'proses_pemesanan'])->name('pemesanan.proses_pemesanan');
    Route::post('/proses-pilih-pembayaran', [ PemesananController::class, 'proses_pilih_pembayaran'])->name('pemesanan.proses_pilih_pembayaran');
    Route::get('/pilih-pembayaran', [ PemesananController::class, 'pilih_pembayaran'])->name('pemesanan.pilih_pembayaran');

    Route::get('/konfirmasi-pemesanan', [ PemesananController::class, 'konfirmasi_pemesanan'])->name('pemesanan.konfirmasi_pemesanan');
    Route::get('/info-pembayaran-tunai', [ PemesananController::class, 'info_pembayaran_tunai'])->name('pemesanan.info_pembayaran_tunai');
    Route::get('/info-pembayaran-bank', [ PemesananController::class, 'info_pembayaran_bank'])->name('pemesanan.info_pembayaran_bank');
    Route::get('/info-pembayaran-e-wallet', [ PemesananController::class, 'info_pembayaran_ewallet'])->name('pemesanan.info_pembayaran_ewallet');
    Route::get('/unggah-bukti-pembayaran', [ PemesananController::class, 'unggah_bukti_pembayaran'])->name('pemesanan.unggah_bukti_pembayaran');
    Route::post('/store-pemesanan' , [ PemesananController::class, 'store_pemesanan'])->name('pemesanan.store_pemesanan');
    Route::get('/selesai-memesan', [ PemesananController::class, 'selesai_memesan'])->name('pemesanan.selesai_memesan');
    
    
    
    Route::get('/pemesanan-berhasil', function () {
        return Inertia::render('Pemesanan/PemesananBerhasil');
    })->name('pemesanan-berhasil');

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

require __DIR__.'/auth.php';