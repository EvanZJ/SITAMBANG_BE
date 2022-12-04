<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/pemesanan', function () {
    return Inertia::render('Pemesanan');
})->middleware(['auth', 'verified'])->name('pemesanan');

Route::get('/pilih-pembayaran', function () {
    return Inertia::render('PilihPembayaran');
})->middleware(['auth', 'verified'])->name('pilih-pembayaran');

Route::get('/konfirmasi-pemesanan', function () {
    return Inertia::render('KonfirmasiPemesanan');
})->middleware(['auth', 'verified'])->name('konfirmasi-pemesanan');


require __DIR__.'/auth.php';
