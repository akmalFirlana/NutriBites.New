<?php

use App\Http\Controllers\ProfileController;
use App\Models\PostTransaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostTransactionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\DiscussionReplyController;

Route::post('/product/{productId}/discussion', [DiscussionController::class, 'store'])->name('discussion.store');
Route::post('/discussion/{discussionId}/reply', [DiscussionReplyController::class, 'store'])->name('discussion.reply');


Route::post('/payment/get-snap-token', [PaymentController::class, 'getSnapToken'])->name('payment.get-snap-token');
Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->name('payment.notification');
Route::post('/get-midtrans-token', [PaymentController::class, 'getMidtransToken']);
Route::post('/save-transaction', [TransactionController::class, 'saveTransaction']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [ProductController::class, 'home'])->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::post('/checkout', [TransactionController::class, 'store'])->name('checkout.store');
    Route::get('/transaction/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::post('/transaction/{transaction}/calculate-shipping', [TransactionController::class, 'calculateShipping'])
        ->name('transaction.calculateShipping');
    Route::get('/store/{user_id}', [ProductController::class, 'toko'])->name('store.show');
    Route::get('/dashboard', [ProductController::class, 'list'])->name('dashboard');
    Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.show');
    Route::get('/kategori', [ProductController::class, 'kategori'])->name('kategori');
    Route::get('/produk', [UserController::class, 'produk'])->name('produk');
    Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('/api/save-transaction', [TransactionController::class, 'saveTransaction']);
    Route::post('/post-transactions/store', [PostTransactionController::class, 'store'])->name('post_transaction.store');
    Route::get('/pembelian', [PostTransactionController::class, 'pembelian'])->name('pesanan');
    Route::post('/products/{product}/review', [ReviewController::class, 'store'])->name('review.store');
});


Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/gudang', [AddressController::class, 'admin'])->name('gudang');
    Route::get('/adminDB', [PostTransactionController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/Admin/Upload', [AddressController::class, 'upload'])->name('admin.upload');
    Route::get('/Admin/Produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/Admin/Pesan', [AdminController::class, 'pesan'])->name('admin.pesan');
    Route::get('/Penjual/Pesanan', [PostTransactionController::class, 'index'])->name('admin.pesanan');
    Route::put('/transactions/{transaction}/confirm', [PostTransactionController::class, 'confirm'])->name('transactions.confirm');
    Route::put('/transactions/{transaction}/ship', [PostTransactionController::class, 'ship'])->name('transactions.ship');
    Route::put('/transactions/{transaction}/cancel', [PostTransactionController::class, 'cancel'])->name('transactions.cancel');
});

Route::put('/transactions/{transaction}/complete', [PostTransactionController::class, 'complete'])->name('transactions.complete');
Route::resource('products', ProductController::class);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/Admin/Produk', [AdminController::class, 'produk'])->name('admin.produk');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{wishlistId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('user.addresses.index');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('user.addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('user.addresses.store');
    Route::get('/get-cities/{provinceId}', [AddressController::class, 'getCities']);
    Route::get('/get-districts/{cityId}', [AddressController::class, 'getDistricts']);
    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
});



