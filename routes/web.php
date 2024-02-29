<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update.cart');
    Route::post('/action/cart/add/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/action/cart/delete/{cart}', [CartController::class, 'destroy'])->name('destroy.cart');
    Route::post('/action/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/{order}/pay', [OrderController::class, 'store_receipt'])->name('store_receipt');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('show_order');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
});
Route::get('/', [ProductController::class, 'index'])->name('product.index');

require __DIR__ . '/auth.php';
