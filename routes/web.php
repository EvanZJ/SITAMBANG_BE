<?php

use App\Http\Controllers\AlatTambakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use Faker\Calculator\Inn;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/debug', function(){
    return view('debug');
});
//stock route
Route::get('/stock', [
    StockController::class, 'index'
])->middleware(['auth', 'verified'])->name('stock.index');

Route::get('/stock/create', [
    StockController::class, 'create'
])->middleware(['auth', 'verified'])->name('stock.create');

Route::post('/stock/create', [
    StockController::class, 'store'
])->middleware(['auth', 'verified'])->name('stock.store');

Route::get('/stock/edit/{id}', [
    StockController::class, 'edit'
])->middleware(['auth', 'verified'])->name('stock.edit');

Route::post('/stock/edit/{id}', [
    StockController::class, 'update'
])->middleware(['auth', 'verified'])->name('stock.update');

Route::post('/stock/delete/{id}', [
    StockController::class, 'destroy'
])->middleware(['auth', 'verified'])->name('stock.delete');

//pemesanan route
Route::get('/pemesanan', function () {
    return Inertia::render('Pemesanan');
})->middleware(['auth', 'verified'])->name('pemesanan');

Route::get('/pilih-pembayaran', function () {
    return Inertia::render('PilihPembayaran');
})->middleware(['auth', 'verified'])->name('pilih-pembayaran');

Route::get('/konfirmasi-pemesanan', function () {
    return Inertia::render('KonfirmasiPemesanan');
})->middleware(['auth', 'verified'])->name('konfirmasi-pemesanan');

Route::get('/info-pembayaran-bank', function () {
    return Inertia::render('InfoPembayaranBank');
})->middleware(['auth', 'verified'])->name('info-pembayaran-bank');


//alat route
Route::get('/alat', [
    AlatTambakController::class, 'index'
])->middleware(['auth', 'verified'])->name('alat.index');

Route::get('/alat/create', [
    AlatTambakController::class, 'create'
])->middleware(['auth', 'verified'])->name('alat.create');

Route::post('/alat/create', [
    AlatTambakController::class, 'store'
])->middleware(['auth', 'verified'])->name('alat.store');

Route::get('/alat/edit/{id}', [
    AlatTambakController::class, 'edit'
])->middleware(['auth', 'verified'])->name('alat.edit');

Route::post('/alat/edit/{id}', [
    AlatTambakController::class, 'update'
])->middleware(['auth', 'verified'])->name('alat.update');

Route::post('/alat/delete/{id}', [
    AlatTambakController::class, 'destroy'
])->middleware(['auth', 'verified'])->name('alat.delete');


require __DIR__.'/auth.php';
