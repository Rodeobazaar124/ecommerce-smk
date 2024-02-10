<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column">
    <x-SangPenyampai/>
    <form action="{{ route('validate.login') }}" method="post">
        @csrf
        <table align="center">
            <tr>
                <th>email</th>
                <td><input required type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <th>password</th>
                <td><input required type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <td><a href="{{ route('register') }}">Register</a></td>
                <td><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
