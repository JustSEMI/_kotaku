<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
    <title>Settings -  KOTAKU</title>
</head>
<body class="dashboard-body">

    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>KOTAKU</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ url('/panel') }}"><i class="fas fa-home"></i> <span>Panel</span></a></li>
                <li><a href="{{ url('/reports') }}"><i class="fas fa-chart-line"></i> <span>Laporan</span></a></li>
                <li><a href="{{ url('/status') }}"><i class="fas fa-microchip"></i> <span>Status Perangkat</span></a></li>
                <li class="active"><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            </ul>
        </aside>

        <main class="main-content" id="main-content">
            <nav class="navbar glass-effect sticky-nav">
                <div class="nav-left">
                    <button class="toggle-btn" id="toggle-sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="nav-title">Pengaturan</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?>!</span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper centered-layout">
                
                <div class="settings-header">
                    <h3>Konfigurasi Panel</h3>
                    <p>Atur preferensi akun dan parameter hardware kotak amal di sini.</p>
                </div>

                <div class="settings-grid">
                    
                    <div class="settings-card glass-panel">
                        <div class="card-title">
                            <i class="fas fa-user-shield"></i>
                            <h4>Keamanan Akun</h4>
                        </div>
                        <form action="#" method="POST">
                            <div class="input-group">
                                <label>Username Admin</label>
                                <input type="text" value="<?= htmlspecialchars(session('user')); ?>" readonly style="opacity: 0.7;">
                            </div>
                            <div class="input-group">
                                <label>Password Baru</label>
                                <input type="password" placeholder="Kosongkan jika tidak ingin diubah">
                            </div>
                            <div class="input-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" placeholder="Ulangi password baru">
                            </div>
                            <button type="button" class="btn-save">Simpan Perubahan</button>
                        </form>
                    </div>

                    <div class="settings-card glass-panel">
                        <div class="card-title">
                            <i class="fas fa-microchip"></i>
                            <h4>Parameter Perangkat</h4>
                        </div>
                        
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <strong>Mode Maintenance</strong>
                                <span>Matikan sementara sensor pembaca uang</span>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <strong>Notifikasi Penuh</strong>
                                <span>Kirim alert jika kapasitas > 90%</span>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="input-group" style="margin-top: 25px;">
                            <label>Target Pengumpulan (Rp)</label>
                            <input type="number" value="1">
                        </div>

                        <button type="button" class="btn-danger" style="margin-top: 15px;">
                            <i class="fas fa-sync-alt"></i> Kalibrasi Ulang Sensor
                        </button>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>