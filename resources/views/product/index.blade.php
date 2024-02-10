<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <x-SangPenyampai />
    Hello {{ Auth::user()->name }}!
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
    <a href="{{ route('cart') }}"><button>🛒 Lihat transaksi</button></a>
    <table border="1">
        <thead>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>AKSI</th>
        </thead>
        <tbody>
            @foreach ($products as $prod)
                <tr>
                    <td>
                        {{ $prod->name }}
                    </td>
                    <td>
                        {{ $prod->description }}
                    </td>
                    <td>
                        {{ $prod->stock }}
                    </td>
                    <td>
                        @convert($prod->price)
                    </td>
                    <td>
                        <a href="{{ $prod->stock < 1 ? '' : '/buy/' . $prod->id }}">
                            <button>Beli</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
