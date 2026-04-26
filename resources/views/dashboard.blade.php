<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="nav-brand">
            <span class="brand-text">KOTAKU</span>
        </div>
        
        <div class="nav-user">
            <span class="user-greeting">Halo, <strong>{{ Auth::user()->username }}</strong></span>
            
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <main class="content landing-view">
        <header class="content-header text-center">
            <h1>Selamat Datang.</h1>
            <p>Sistem Kotak Amal Terpadu & Terukur siap dikelola.</p>
        </header>

        <div class="action-area">
            <a href="{{ route('panel') }}" class="btn-panel">
                Buka Panel Utama
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </main>

    <footer class="dashboard-footer">
        <p>&copy; 2026 KOTAKU System. Developed by Kelompok 4 TKK (B) 2025</p>
    </footer>

</body>
</html>