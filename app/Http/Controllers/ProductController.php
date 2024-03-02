<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = [];
        if (request('query') && request('query') !== null) {
            $query = request('query');
            $products = Product::where('name', 'like', '%'.$query.'%')->orWhere('price', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->paginate(8);
        } else {
            $products = Product::paginate(8);
        }

        if (Auth::check() && Auth::user()->is_admin) {
            return view('product.index', compact('products'));
        }

        return view('product.index_user', compact('products'));

        // return view('bootstrap.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $data['image'] = time().'_'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/product/'.$data['image'], $file->getContent());
        Product::create($data);

        return Redirect::route('product.index')->with(['success' => 'Produk'.$data['name'].' berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $new_data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $new_data['image'] = time().'_'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            Storage::disk('local')->put('public/product/'.$new_data['image'], $file->getContent());
            Storage::delete($product->image);
        }

        $product->update($new_data);

        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('product.index');
    }
}
