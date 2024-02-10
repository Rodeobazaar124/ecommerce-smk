<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            margin-top: 15px
        }
    </style>
</head>

<body>
    <a href="{{ route('home') }}"><button>🏠 Back to Home</button></a>
    <a href="{{ route('cart') }}"><button>🛒 Cart</button></a>
    <table border="1" >
        @foreach ($transactions as $trans)
            <tr pad>
                <table border="1">
                    <tr>
                        <td>Product Name</td>
                        <td>{{ $trans->product->name }}</td>
                    </tr>
                    <tr>
                        <td>Customer Name</td>
                        <td>{{ $trans->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Product Amount</td>
                        <td>{{ $trans->amount }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>{{ $trans->total_price }}</td>
                    </tr>
                    <tr>
                        <td>Ordered At</td>
                        <td>{{ $trans->created_at->diffForHumans() }}</td>
                    </tr>
                </table>
            </tr>
        @endforeach
    </table>
</body>

</html>
