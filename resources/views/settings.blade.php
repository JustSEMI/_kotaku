<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
</head>
<body class="dashboard-body">
    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header"><h2>KOTAKU</h2></div>
            <ul class="sidebar-menu">
                <li><a href="{{ url('/panel') }}"><i class="fas fa-home"></i> <span>Panel</span></a></li>
                <li><a href="{{ url('/laporan') }}"><i class="fas fa-chart-line"></i> <span>Laporan</span></a></li>
                <li><a href="{{ url('/status') }}"><i class="fas fa-microchip"></i> <span>Status Perangkat</span></a></li>
                <li class="active"><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            </ul>
        </aside>

        <main class="main-content" id="main-content">
            <nav class="navbar">
                <div class="nav-left">
                    <button class="toggle-btn" id="toggle-sidebar"><i class="fas fa-bars"></i></button>
                    <div class="nav-title">Pengaturan Sistem</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?></span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="settings-card glass-panel">
                    <div class="card-title">
                        <i class="fas fa-sliders-h"></i> Konfigurasi Hardware
                    </div>

                    <div class="toggle-group">
                        <div class="toggle-info">
                            <strong>Mode Hemat Daya</strong>
                            <span>Matikan sementara sensor pembaca uang saat tidak aktif</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="toggle-group">
                        <div class="toggle-info">
                            <strong>Notifikasi Penuh</strong>
                            <span>Kirim peringatan jika kapasitas sistem > 90%</span>
                        </div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="input-group">
                        <label>Target Pengumpulan (Rp)</label>
                        <input type="number" value="1000000">
                    </div>

                    <button type="button" class="btn-kalibrasi">
                        <i class="fas fa-sync-alt"></i> Kalibrasi Ulang Sensor
                    </button>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>