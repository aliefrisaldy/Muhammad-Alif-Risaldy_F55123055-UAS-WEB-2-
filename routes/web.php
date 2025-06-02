<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MainProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FarmerController;



Route::get('/', function () {
    return redirect()->route('auth.login'); 
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.store');
Route::post('/login', [AuthController::class, 'login'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware('auth')->group(function () { 
    Route::resource('produk', ProductController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('petani', PetaniController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/products', [MainProductsController::class, 'index'])->name('products.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/sukses/{nomorPesanan}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/pesanan', [CheckoutController::class, 'daftarPesanan'])->name('checkout.daftar-pesanan');
    Route::get('/pesanan/{nomorPesanan}', [CheckoutController::class, 'detailPesanan'])->name('checkout.detail-pesanan');
    Route::delete('/pesanan/{nomorPesanan}/batalkan', [CheckoutController::class, 'batalkanPesanan'])->name('checkout.batalkan-pesanan');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');

    Route::get('/farmers', [FarmerController::class, 'index'])->name('farmers.index');
    Route::get('/farmers/{id}', [FarmerController::class, 'show'])->name('farmers.show');

});