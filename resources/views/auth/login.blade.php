<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="login-container">
        <div class="login-header">
            <h1>KOTAKU</h1>
            <p>Kotak Amal Terpadu & Terukur</p>
        </div>

        @if (session('status'))
            <div style="color: #10b981; font-size: 0.875rem; margin-bottom: 1.5rem; text-align: center; background: rgba(16, 185, 129, 0.1); padding: 10px; border-radius: 6px; border: 1px solid rgba(16, 185, 129, 0.2);">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="login-form">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@kotaku.local"
                    required autofocus>

                @error('email')
                <span style="color: #ef4444; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <div class="password-header">
                    <label for="password">Password</label>
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot?</a>
                </div>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">Login Masuk</button>
        </form>

        <div class="login-footer">
            <p>&copy; 2026 KOTAKU System. Built with precision.</p>
        </div>
    </div>

</body>

</html>