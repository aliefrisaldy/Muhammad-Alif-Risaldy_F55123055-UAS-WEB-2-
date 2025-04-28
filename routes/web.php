<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return redirect()->route('dashboard.index');
})->name('dashboard.index');

Route::resource('produk', ProductController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('petani', PetaniController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
