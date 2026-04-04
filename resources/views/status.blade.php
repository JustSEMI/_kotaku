<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
    <title>Status Perangkat -  KOTAKU</title>
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
                <li class="active"><a href="{{ url('/status') }}"><i class="fas fa-microchip"></i> <span>Status Perangkat</span></a></li>
                <li><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            </ul>
        </aside>

        <main class="main-content" id="main-content">
            <nav class="navbar glass-effect sticky-nav">
                <div class="nav-left">
                    <button class="toggle-btn" id="toggle-sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="nav-title">Status</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?>!</span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper centered-layout">
                
                <div class="status-header glass-panel">
                    <div class="status-indicator">
                        <div class="pulse-ring"></div>
                        <i class="fas fa-wifi"></i>
                        <div class="status-text">
                            <h3>ESP32 C6 Terhubung</h3>
                            <p>Terakhir sinkronisasi: 120 detik yang lalu</p>
                        </div>
                    </div>
                    <div class="ping-info">
                        <span>Latency:</span>
                        <strong style="color: #4ade80;">5ms</strong>
                    </div>
                </div>

                <div class="status-grid">
                    
                    <div class="sensor-card glass-panel">
                        <div class="card-title">
                            <i class="fas fa-battery-three-quarters"></i>
                            <h4>Battery</h4>
                        </div>
                        
                        <div class="capacity-visual">
                            <div class="progress-bar-container">
                                <div class="progress-bar fill-success" style="height: 100%;"></div>
                            </div>
                            <div class="capacity-info">
                                <h1>100%</h1>
                                <p>Terisi</p>
                                <span class="badge warning">DUMMY</span>
                            </div>
                        </div>

                        <div class="sensor-details">
                            <div class="sensor-item">
                                <i class="fas fa-thermometer-half" style="color: #ff6b6b;"></i>
                                <div>
                                    <p>Suhu Dalam</p>
                                    <strong>25°C</strong>
                                </div>
                            </div>
                            <div class="sensor-item">
                                <i class="fas fa-eye" style="color: #6366f1;"></i>
                                <div>
                                    <p>Sensor Uang</p>
                                    <strong style="color: #4ade80;">10</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="log-card glass-panel">
                        <div class="card-title">
                            <i class="fas fa-terminal"></i>
                            <h4>System Logs</h4>
                        </div>
                        
                        <div class="terminal-window">
                            <div class="log-entry">[03:10:20] NETWORK > IP Address assigned: 192.168.1.45</div>
                        </div>

                        <button class="btn-clear-log"><i class="fas fa-trash-alt"></i> Bersihkan Log</button>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>