<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi - KOTAKU</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
</head>
<body class="dashboard-body">

    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>KOTAKU</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ url('/panel') }}"><i class="fas fa-home"></i> <span>Panel</span></a></li>
                <li class="active"><a href="{{ url('/laporan') }}"><i class="fas fa-chart-line"></i> <span>Laporan</span></a></li>
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
                    <div class="nav-title">Laporan Transaksi</div>
                </div>
                <div class="user-info">
                    <span>Halo, <?= htmlspecialchars(session('user')); ?></span>
                    <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="content-wrapper">
                
                <div class="filter-card glass-panel">
                    <form action="#" class="filter-row">
                        <div class="filter-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="start_date">
                        </div>
                        <div class="filter-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="end_date">
                        </div>
                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        
                        <button type="button" class="btn-export">
                            <i class="fas fa-file-export"></i> Export PDF
                        </button>
                    </form>
                </div>

                <div class="table-container glass-panel">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal & Waktu</th>
                                <th>Nominal</th>
                                <th>Metode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#TRX001</td>
                                <td>05 Apr 2026, 10:30</td>
                                <td>Rp 5.000</td>
                                <td>Tunai (Sensor)</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                            </tr>
                            <tr>
                                <td>#TRX002</td>
                                <td>05 Apr 2026, 09:15</td>
                                <td>Rp 2.000</td>
                                <td>Tunai (Sensor)</td>
                                <td><span class="badge badge-success">Selesai</span></td>
                            </tr>
                            <tr>
                                <td>#TRX003</td>
                                <td>04 Apr 2026, 18:45</td>
                                <td>Rp 10.000</td>
                                <td>Tunai (Sensor)</td>
                                <td><span class="badge badge-pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>