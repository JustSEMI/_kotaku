@if(session('error'))
    <div class="error-msg">{{ session('error') }}</div>
@endif

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN KOTAKU</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">LOGIN KOTAKU</div>
            <form method="POST" action="{{ url('login-process') }}">
                @csrf
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="position-relative">
                        <i class="fas fa-user input-icon"></i> 
                        <input type="text" id="username" name="username" class="form-input" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="login-button">LogIn</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>