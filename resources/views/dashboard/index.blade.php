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
    <h3>Last Customer Transaction</h3>
    <table border="1">
        <thead>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Total Price</th>
        </thead>
@foreach ($transactions as $t)
<tr>
    <td>{{ $t->user->name }}</td>
    <td>{{ $t->product->name }}</td>
    <td>{{ $t->amount }}</td>
    <td>{{ $t->total_price }}</td>
</tr>
@endforeach
    </table>
</body>

</html>
