<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('cart.index', ['carts' => $carts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created cart in storage.
     */
    public function addToCart(Product $product, Request $request)
    {
        $user_id = Auth::id();
        $product_id = $product->id;
        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
        if ($existing_cart === null) {
            $request->validate([
                'amount' => 'required|gte:1|lte:'.$product->stock,
            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount,
            ]);
        } else {
            $request->validate([
                'amount' => 'required|gte:1|lte:'.($product->stock -
                    $existing_cart->amount),
            ]);
            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount,
            ]);
        }

        return Redirect::route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_cart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:'.$cart->product->stock,
        ]);
        $cart->update([
            'amount' => $request->amount,
        ]);

        return Redirect::route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return Redirect::back();
    }
}
