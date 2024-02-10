<?php

use App\Models\product;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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



// Public Route / Unauthenticated Users Only
Route::group([
    'middleware' => ['guest']
], function () {


    Route::get('login', function () {
        return view('auth.login');
    })->name('login');


    Route::get('register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('validate/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['min:6', 'required']
        ]);
        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors('Credentials does`nt match with our records');
        }
        return redirect()->route('home');
    })->name('validate.login');

    Route::post('validate/register', function (Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'password' => ['min:6', 'required']
        ]);
        User::create($credentials);
        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors('Credentials does`nt match with our records');
        }
        return redirect()->route('home');
    })->name('validate.register');
});

// Authenticated Route
Route::group([
    'middleware' => ['auth']
], function () {
    Route::post('logout', function () {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
    Route::get('user/cart', function () {
        $transactions = auth()->user()->transactions;
        return view('product.cart', ['transactions' => $transactions]);
    })->name('cart');

    Route::get('/', function () {
        $products = product::get();
        return view('product.index', compact('products'));
    })->name('home');
    Route::get('/buy/{product:id}', function (product $product) {
        return view('product.show', compact('product'));
    });
    Route::post('/buy', function (Request $request) {
        // return $request;
        $data = $request->validate([
            'product_id' => 'exists:products,id',
            'amount' => 'numeric'
        ]);
        $product = product::where('id', $data['product_id'])->first();
        if ($product->stock <  $data['amount']) {
            return redirect()->back()->withErrors(['amount' => 'Quantity or Amount cannot be greater than available stock']);
        }
        $product->update(['stock' => $product->stock -  $data['amount']]);
        $data['total_price'] = $product->price * $data['amount'];
        $data['user_id'] = auth()->user()->id;
        transaction::create($data);
        return redirect()->route('home')->with('success', 'Product successfully added to your cart/transaction');
    })->name('handleBuy');
});
//  Admin Routes
Route::group([
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('dashboard', function () {
        $transactions = transaction::latest()->get();
        // return $transactions;
        return view('dashboard.index', compact('transactions'));
    });
    Route::get('dashboard/product', function () {
        $products = product::latest()->get();
        // return $transactions;
        return view('dashboard.product.index', compact('products'));
    })->name('product.index');
    Route::get('dashboard/product/{product:id}', function (product $product) {
        $products = product::latest()->get();
        // return $transactions;
        return view('dashboard.product.index', compact('products'));
    })->name('product.edit');
    Route::delete('product/{product:id}', function (product $product) {
        $product->deleteOrFail();

        return redirect()->back()->with('success', 'product deleted successfully');
    })->name('product.delete');
});
