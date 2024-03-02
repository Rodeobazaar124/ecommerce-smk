<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = [];
        if (Auth::user()->is_admin) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', Auth::user()->id)->get();
        }

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        if ($carts == null) {
            return Redirect::back();
        }
        $order = Order::create([
            'user_id' => $user_id,
        ]);
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);
            $product->update([
                'stock' => $product->stock - $cart->amount,
            ]);
            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
            ]);
            $cart->delete();
        }

        return Redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function store_receipt(Order $order, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time().'_'.$order->id.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, $file->getContent());
        $order->update([
            'receipt' => $path,
        ]);

        return Redirect::back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function confirm_payment(Order $order)
    {
        $order->update([
            'status' => 'paid',
        ]);

        return Redirect::back();
    }

    public function reject_payment(Order $order)
    {
        $order->status = 'rejected';
        $order->receipt = null;
        $order->updateOrFail();

        return Redirect::back();
    }

    public function nota(Order $order)
    {
        return view('order.nota', compact('order'));
    }
}
