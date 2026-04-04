<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ url('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
    <title>Dashboard - KOTAKU</title>
</head>
<body class="dashboard-body">

    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>KOTAKU</h2>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><a href="{{ url('/panel') }}"><i class="fas fa-home"></i> <span>Panel</span></a></li>
                <li><a href="{{ url('/reports') }}"><i class="fas fa-chart-line"></i> <span>Laporan</span></a></li>
                <li><a href="{{ url('/status') }}"><i class="fas fa-microchip"></i> <span>Status Perangkat</span></a></li>
                <li><a href="{{ url('/settings') }}"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            </ul>
        </aside>

        <main class="main-content" id="main-content">
            <nav class="navbar">
                <div class="nav-left">
                    <button class="toggle-btn" id="toggle-sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="nav-title">Dashboard</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?>!</span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper">
                
                <div class="summary-grid">
                    <div class="summary-card glass-panel">
                        <div class="info">
                            <p>Total Pemasukan</p>
                            <h3>-</h3>
                        </div>
                        <i class="fas fa-wallet icon-wallet"></i>
                    </div>
                    <div class="summary-card glass-panel">
                        <div class="info">
                            <p>Total Transaksi</p>
                            <h3>-</h3>
                        </div>
                        <i class="fas fa-exchange-alt icon-trx"></i>
                    </div>
                    <div class="summary-card glass-panel hardware-card">
                        <div class="info">
                            <p>Status Hardware</p>
                            <h3>-</h3>
                        </div>
                        <i class="fas fa-wifi icon-status"></i>
                    </div>
                </div>

                <div class="chart-card glass-panel">
                    <h3>Grafik Pemasukan Harian</h3>
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>