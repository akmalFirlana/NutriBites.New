<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('testing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/fix', function () {
    return view('fix');
})->middleware(['auth', 'verified'])->name('fix');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [ProductController::class, 'list'])->name('dashboard');
    Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.show');
    Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
    Route::get('/favorit', [UserController::class, 'favorit'])->name('favorit');
    Route::get('/kategori', [UserController::class, 'kategori'])->name('kategori');
    Route::get('/produk', [UserController::class, 'produk'])->name('produk');
});


Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    
    Route::get('/admindashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Admin/Upload',[AdminController::class, 'upload'])->name('admin.upload');
    Route::get('/Admin/Produk',[AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/Admin/Pesanan',[AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/Admin/Pesan',[AdminController::class, 'pesan'])->name('admin.pesan');
    
});


Route::resource('products', ProductController::class);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/Admin/Produk',[AdminController::class, 'produk'])->name('admin.produk');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});
