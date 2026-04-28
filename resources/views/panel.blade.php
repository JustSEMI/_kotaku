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
                <a href="{{ route('settings') }}" class="nav-link">Pengaturan</a>
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
                    <p class="card-desc">Dari {{ $jumlahTransaksi }} kali transaksi</p>
                </div>
                <div class="summary-card">
                    <div class="card-title-wrapper">
                        <p class="card-title">Status</p>
                        <span class="status-dot offline"></span>
                    </div>
                    <h2 class="card-value">NULL</h2>
                    <p class="card-desc">Menunggu data masuk...</p>
                </div>
            </div>

            <div class="table-container">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="font-weight: 500; font-size: 1.1rem;">Riwayat Pemasukan Terakhir</h3>
                </div>

                <div
                    style="margin-bottom: 25px; padding: 15px; background: rgba(255,255,255,0.02); border-radius: 10px; border: 1px solid #1f1f1f;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="color: #9ca3af; font-size: 0.85rem;">Progress Target Bulanan</span>
                        <span style="color: #10b981; font-weight: 600; font-size: 0.85rem;">{{
                            number_format($persentaseTarget, 1) }}%</span>
                    </div>
                    <div
                        style="background: #1a1a1a; height: 10px; border-radius: 5px; overflow: hidden; border: 1px solid #333;">
                        <div
                            style="background: linear-gradient(90deg, #10b981, #3b82f6); height: 100%; width: {{ $persentaseTarget }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                    <p style="color: #6b7280; font-size: 0.75rem; margin-top: 8px;">
                        Terkumpul Rp {{ number_format($totalSaldo, 0, ',', '.') }} dari target Rp {{
                        number_format($targetSaldo, 0, ',', '.') }}
                    </p>
                </div>
                <table class="data-table">
                </table>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Riwayat Pemasukan Terakhir</h3>
                    <a href="{{ route('panel.export') }}" class="btn-sm" style="text-decoration: none;">Unduh
                        Laporan</a>
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
                        <tr
                            style="{{ (int)$item->amount >= (int)$highlightThreshold ? 'background-color: rgba(245, 158, 11, 0.15) !important; border-left: 3px solid #f59e0b !important;' : '' }}">
                            <td>{{ $item->created_at->format('d M Y, H:i') }} WIB</td>
                            <td>{{ $item->sensor_id }}</td>
                            <td><span class="badge success">{{ $item->status }}</span></td>
                            <td class="text-right">Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 2rem; color: #6b7280;">Belum ada data
                                transaksi masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>