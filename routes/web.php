<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('testing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
});


Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    
    Route::get('/admindashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Admin/Upload',[AdminController::class, 'upload'])->name('admin.upload');
});

use App\Http\Controllers\ProductController;

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
