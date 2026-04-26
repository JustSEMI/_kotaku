<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Utama | KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    <div class="panel-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>KOTAKU</h2>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('panel') }}" class="nav-link active">Panel Utama</a>
                <a href="#" class="nav-link">Pengaturan</a>
            </nav>

            <div class="sidebar-footer">
                <span class="user-greeting">Halo, {{ Auth::user()->username }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-sidebar">Logout</button>
                </form>
            </div>
        </aside>

        <main class="panel-content">
            <header class="content-header">
                <h1>Overview Sistem</h1>
                <p>Pantau status perangkat dan riwayat dana secara *real-time*.</p>
            </header>

            <div class="summary-grid">
                <div class="summary-card">
                    <p class="card-title">Total Saldo Terkumpul</p>
                    <h2 class="card-value">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</h2>
                    <p class="card-desc">Total keseluruhan sistem</p>
                </div>
                <div class="summary-card">
                    <p class="card-title">Pemasukan Bulan Ini</p>
                    <h2 class="card-value">Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</h2>
                    <p class="card-desc">Dari {{ $jumlahTransaksi }} kali transaksi sensor</p>
                </div>
                <div class="summary-card">
                    <div class="card-title-wrapper">
                        <p class="card-title">Status NodeMCU</p>
                        <span class="status-dot online"></span> 
                    </div>
                    <h2 class="card-value">Online</h2>
                    <p class="card-desc">Menunggu data masuk...</p>
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Riwayat Pemasukan Terakhir</h3>
                    <a href="{{ route('panel.export') }}" class="btn-sm" style="text-decoration: none;">Unduh Laporan</a>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>ID Sensor</th>
                            <th>Status Data</th>
                            <th class="text-right">Estimasi Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d M Y, H:i') }} WIB</td>
                            <td>{{ $item->sensor_id }}</td>
                            <td><span class="badge success">{{ $item->status }}</span></td>
                            <td class="text-right">Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 2rem; color: #6b7280;">Belum ada data transaksi masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>