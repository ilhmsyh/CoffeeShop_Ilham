<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;

// Route untuk Kasir
// routes/web.php
Route::resource('kasir', KasirController::class);
// Route::resource('produk', ProdukController::class);

// Route untuk Transaksi
// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

// Redirect root URL ke halaman kasir
// Route::get('/', function () {
//     return redirect()->route('kasir.index');
// });
Auth::routes();


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
});

Route::get('kasir/{id}/edit', [KasirController::class, 'edit'])->name('kasir.edit');

Route::put('kasir/{id}', [KasirController::class, 'update'])->name('kasir.update');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::resource('produk', ProdukController::class);

Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');

Route::resource('transaksi', TransaksiController::class);

Route::resource('kasir', KasirController::class);


