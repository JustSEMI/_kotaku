<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN KOTAKU</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="login-page-wrapper">
        <div class="login-container">
            <div class="login-box">
                <div class="login-header">LOGIN KOTAKU</div>
                @if(session('error'))
                    <div style="color: #ff4d4d; background: rgba(255,0,0,0.1); border: 1px solid rgba(255,0,0,0.3); padding: 10px; border-radius: 5px; margin-bottom: 20px; font-size: 0.9rem;">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="/login-process">
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
                        <button type="submit" class="login-button">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="login-footer">
            &copy; 2026 KOTAKU (Kotak Amal Terpadu & Terukur). Dibuat dengan <i class="fas fa-heart" style="color: #ff6b6b;"></i> oleh Kelompok 3 TKK (B).
        </footer>
    </div>
</body>
</html>