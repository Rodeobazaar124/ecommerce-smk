<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <table border="1">
        <tbody>
            <tr>
                <th>Nama</th>

                <td>
                    {{ $product->name }}
                </td>
            <tr>
                <th>Deskripsi</th>

                <td>
                    {{ $product->description }}
                </td>

            </tr>
            <tr>
                <th>Stok</th>

                <td>
                    {{ $product->stock }}
                </td>
            </tr>
            <tr>
                <th>Harga</th>

                <td>
                    @convert($product->price)
                </td>
            </tr>
            <th>Jumlah beli</th>
            <td>
                <script defer>
                    let amount = 1;

                    function inc() {
                        amount++
                        document.getElementById('amount').value = amount
                    }

                    function dec() {
                        amount++
                        document.getElementById('amount').value = amount
                    }
                </script>
                <form action="{{ route('handleBuy') }}" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <input type="number" value="1" id="amount" name="amount">
                    <button type="submit">Beli</button>
                </form>
                <button onclick="inc()">+</button>
                <button onclick="dec()">-</button>


            </td>

            </tr>

        </tbody>
    </table>
</body>

</html>
