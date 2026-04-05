<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Perangkat - KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/status.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
</head>
<body class="dashboard-body">
    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header"><h2>KOTAKU</h2></div>
            <ul class="sidebar-menu">
                <li><a href="{{ url('/panel') }}"><i class="fas fa-home"></i> <span>Panel</span></a></li>
                <li><a href="{{ url('/laporan') }}"><i class="fas fa-chart-line"></i> <span>Laporan</span></a></li>
                <li class="active"><a href="{{ url('/status') }}"><i class="fas fa-microchip"></i> <span>Status Perangkat</span></a></li>
                <li><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            </ul>
        </aside>

        <main class="main-content" id="main-content">
            <nav class="navbar">
                <div class="nav-left">
                    <button class="toggle-btn" id="toggle-sidebar"><i class="fas fa-bars"></i></button>
                    <div class="nav-title">Status Perangkat</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?></span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="glass-panel" style="padding: 30px; margin-bottom: 30px;">
                    <div class="status-grid">
                        <div class="sensor-item">
                            <i class="fas fa-battery-three-quarters" style="color: #50c878;"></i>
                            <div><p>Kapasitas Baterai</p><strong>78%</strong></div>
                        </div>
                        <div class="sensor-item">
                            <i class="fas fa-thermometer-half" style="color: #ff6b6b;"></i>
                            <div><p>Suhu Dalam</p><strong>25°C</strong></div>
                        </div>
                        <div class="sensor-item">
                            <i class="fas fa-eye" style="color: #4a90e2;"></i>
                            <div><p>Sensor Uang</p><strong style="color: #4ade80;">Aktif</strong></div>
                        </div>
                    </div>
                </div>

                <div class="log-card glass-panel">
                    <div class="card-title">
                        <i class="fas fa-terminal"></i>
                        <h4>System Logs</h4>
                    </div>
                    <div class="terminal-window">
                        <div class="log-entry">[03:10:20] SYSTEM > Initializing hardware components...</div>
                        <div class="log-entry">[03:10:22] NETWORK > IP Address assigned: 192.168.1.45</div>
                        <div class="log-entry">[03:15:40] SENSOR > Motion detected, waking up.</div>
                    </div>
                    <button class="btn-clear-log"><i class="fas fa-trash-alt"></i> Bersihkan Log</button>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>