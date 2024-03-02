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
     * Menampilkan seluruh produk
     * atau bila ada request query tampilkan produk sesuai dengan query tersebut
     * kemudian paginate
     *
     * @return view
     */

    public function index()
    {
        $products = [];
        if (request('query') && request('query') !== null) {
            $query = request('query');
            $products = Product::where('name', 'like', '%' . $query . '%')->orWhere('price', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->paginate(8);
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
     * Menampikan halaman buat produk baru untuk admin
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Menyimpan produk yang sudah dikirimkan dari halaman 'product.create' ke databa
     */
    public function store(StoreProductRequest $request)
    {
        // Validasi apakah semua data sudah diisi
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|number',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        // Simpan file kedalam sebuah variabel
        $file = $request->file('image');
        // Buat nama file baru berdasarkan timestamps
        $data['image'] = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        // Simpan file dengan nama yang telah ditentukan
        Storage::disk('local')->put('public/product/' . $data['image'], $file->getContent());
        // Simpan data yang sudah di validasi ke database
        Product::create($data);
        // Alihkan user/admin ke halaman home
        return Redirect::route('product.index')->with(['success' => 'Produk ' . $data['name'] . ' berhasil ditambahkan']);
    }

    /**
     * Menampilkan suatu produk
     *
     * @param Product $product
     * @return view
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Tampilkan halaman edit product dengan mengirimkan data product sebelumnya
     *
     * @param Product $product
     * @return view
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     *
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Validasi data yang dikirimkan kemudian simpan kedalam variable
        $new_data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);
        // Cek apakah file image tersedia
        if ($request->hasFile('image')) {
            // simpan file ke variable
            $file = $request->file('image');
            // buat nama file unik berdasarkan timestamps
            $new_data['image'] = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            // Simpan gambar ke local disk
            Storage::disk('local')->put('public/product/' . $new_data['image'], $file->getContent());
            // Hapus gambar lama
            Storage::delete($product->image);
        }
        // Update data product
        $product->update($new_data);
        // Alihkan ke halaman show product
        return Redirect::route('product.show', $product->id)->with(['success' => "Produk {$new_data['name']} berhasil diubah"]);
    }

    /**
     * Menghapus product dari database dan local disk
     *
     * @param Product $product
     * @return Redirect
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('product.index');
    }
}
