<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Ecommerce\CartController;
use App\Http\Controllers\Ecommerce\FrontController;
use App\Http\Controllers\Ecommerce\LoginController;
use App\Http\Controllers\Ecommerce\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/product', [FrontController::class, 'product'])->name('front.product');
Route::get('/category/{slug}', [FrontController::class, 'categoryProduct'])->name('front.category');
Route::get('/product/{slug}', [FrontController::class, 'show'])->name('front.show_product');
Route::post('cart', [CartController::class, 'addToCart'])->name('front.cart');
Route::get('/cart', [CartController::class, 'listCart'])->name('front.list_cart');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('front.update_cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('front.store_checkout');
Route::get('/checkout/{invoice}', [CartController::class, 'checkoutFinish'])->name('front.finish_checkout');
Route::group(['prefix' => 'member', 'namespace' => 'Ecommerce'], function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('customer.login');
    Route::post('login', [LoginController::class, 'login'])->name('customer.post_login');
    Route::get('verify/{token}', [FrontController::class, 'verifyCustomerRegistration'])->name('customer.verify');
    Route::get('orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('orders/{invoice}', [OrderController::class, 'view'])->name('customer.view_order');
    Route::get('orders/pdf/{invoice}', [OrderController::class, 'pdf'])->name('customer.order_pdf');
});
Route::group(['middleware' => 'customer'], function () {
    Route::get('setting', [FrontController::class, 'customerSettingForm'])->name('customer.settingForm');
    Route::post('setting', [FrontController::class, 'customerUpdateProfile'])->name('customer.setting');
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('customer.logout');
});


Auth::routes();
Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('category', CategoryController::class)->except(['create', 'show']);
    Route::resource('product', ProductController::class)->except(['show']);
    Route::get('/product/bulk', [ProductController::class, 'massUploadForm'])->name('product.bulk');
    Route::post('/product/bulk', [ProductController::class, 'massUpload'])->name('product.saveBulk');
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/{invoice}', [OrderController::class, 'view'])->name('orders.view');
    });
    Route::get('/payment/{invoice}', [OrderController::class, 'acceptPayment'])->name('orders.approve_payment');
});

Route::group(['prefix' => 'reports'], function () {
    Route::get('/order', [HomeController::class, 'orderReport'])->name('report.order');
    Route::get('/order/pdf/{daterange}', [HomeController::class, 'orderReportPdf'])->name('report.order_pdf');
    Route::get('/return', [HomeController::class, 'returnReport'])->name('report.return');
    Route::get('/return/pdf/{daterange}', [HomeController::class, 'returnReportPdf'])->name('report.return_pdf');
});

Route::get('/test/mail/send', function () {
    return Mail::to('azfasa15@gmail.com')->send(new TestMail());
});
