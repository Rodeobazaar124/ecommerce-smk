<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dasboard</title>
</head>

<body>
    Hello {{ auth()->user()->name }}! it's a good day isn't it?
    <h3>Our Products</h3>
    <table border="1">
        <thead>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Action</th>
        </thead>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if ($product->transactions->count() > 0)
                        {{-- <button disabled>Delete</button> --}}
                        <small>A transaction with this Product/ID Exists. Cannot delete Or Edit this product</small>
                    @else
                    <a href="{{ route('product.edit', $product->id) }}"><button>Edit</button></a>
                        <form method="POST" action="{{ route('product.delete', $product->id) }}">@csrf
                            @method('DELETE')<button>Delete</button></form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
