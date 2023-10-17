<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

Route::get('/master', function () {
    return view('layouts.master');
});


route::resource('dashboard' , DashboardController::class);
route::resource('kategori' , KategoriController::class);
route::resource('produk', ProdukController::class);
route::resource('transaksi', TransaksiController::class);
route::resource('user' , UserController::class);
Route::get('/invoice/{no_order}', [TransaksiController::class, 'invoice'])->name('invoice');
route::resource('riwayat-transaksi', RiwayatTransaksiController::class);