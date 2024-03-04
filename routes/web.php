<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use App\Models\Product;
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

Route::get('/', [ProductController::class, 'index'])->name('product.index');


// Can be accessed only by admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        $product = Product::count();
        $order = Order::count();
        return view('dashboard', compact('order', 'product'));
    })->name('dashboard');
    // Product Routes
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

    Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
    // Order Routes
    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
    Route::post('/order/{order}/reject', [OrderController::class, 'reject_payment'])->name('reject_payment');
});
// Can be accessed by authenticated code
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Cart soutes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update.cart');
    Route::post('/action/cart/add/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/action/cart/delete/{cart}', [CartController::class, 'destroy'])->name('destroy.cart');

    // Order routes
    Route::post('/action/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order/{order}/pay', [OrderController::class, 'store_receipt'])->name('store_receipt');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('show_order');
    Route::get('/order/nota/{order}', [OrderController::class, 'nota'])->name('nota');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
});
// Product Routes
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

require __DIR__ . '/auth.php';
