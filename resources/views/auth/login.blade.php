@if(session('error'))
    <div class="error-msg">{{ session('error') }}</div>
@endif

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>KOTAKU LOGIN</title>
</head>
<body>

    <div class="login-container">
        <h2>LOJIN KOTAKU</h2>

        <form action="/login-process" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>

</body>
</html>