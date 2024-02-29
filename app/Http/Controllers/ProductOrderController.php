<?php

namespace App\Http\Controllers;

use App\Models\product_order;
use App\Http\Requests\Storeproduct_orderRequest;
use App\Http\Requests\Updateproduct_orderRequest;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeproduct_orderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(product_order $product_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_order $product_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateproduct_orderRequest $request, product_order $product_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_order $product_order)
    {
        //
    }
}
