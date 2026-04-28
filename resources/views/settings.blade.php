<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Monitoring | KOTAKU</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
    <style>
        /* CSS Khusus Halaman Pengaturan */
        .settings-container { max-width: 900px; margin-top: 2rem; }
        .setting-section { 
            background-color: #111111; 
            border: 1px solid #1f1f1f; 
            border-radius: 0.75rem; 
            padding: 2rem; 
            margin-bottom: 2rem;
        }
        .section-header { margin-bottom: 1.5rem; }
        .section-header h3 { font-weight: 400; font-size: 1.25rem; margin-bottom: 0.25rem; }
        .section-header p { color: #6b7280; font-size: 0.875rem; }
        
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; font-size: 0.75rem; color: #9ca3af; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .form-control { 
            width: 100%; 
            background: #050505; 
            border: 1px solid #333; 
            color: #ededed; 
            padding: 0.85rem 1rem; 
            border-radius: 0.5rem; 
            font-family: 'Inter', sans-serif;
            transition: border-color 0.3s;
        }
        .form-control:focus { outline: none; border-color: #10b981; }
        
        .btn-save { 
            background: #ededed; 
            color: #0a0a0a; 
            border: none; 
            padding: 0.85rem 2rem; 
            border-radius: 0.5rem; 
            cursor: pointer; 
            font-weight: 600; 
            transition: opacity 0.3s;
        }
        .btn-save:hover { opacity: 0.9; }

        .alert-success {
            background: rgba(16, 185, 129, 0.1); 
            border: 1px solid #10b981; 
            color: #10b981; 
            padding: 1rem 1.5rem; 
            border-radius: 0.5rem; 
            margin-bottom: 2rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="panel-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>KOTAKU</h2>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('panel') }}" class="nav-link">Panel Utama</a>
                <a href="{{ route('settings') }}" class="nav-link active">Pengaturan</a>
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
                <h1>Konfigurasi Monitoring</h1>
                <p>Sesuaikan bagaimana data visual ditampilkan pada sistem KOTAKU.</p>
            </header>

            <div class="settings-container">
                
                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    
                    <div class="setting-section">
                        <div class="section-header">
                            <h3>Target Finansial</h3>
                            <p>Tentukan target saldo untuk menghitung persentase pencapaian di dashboard.</p>
                        </div>
                        <div class="form-group">
                            <label>Target Saldo Bulanan (IDR)</label>
                            <input type="number" name="target_saldo" class="form-control" value="{{ $settings['target_saldo'] ?? '' }}" required>
                        </div>
                    </div>

                    <div class="setting-section">
                        <div class="section-header">
                            <h3>Preferensi Visual</h3>
                            <p>Atur ambang batas peringatan dan kecepatan pembaruan data layar.</p>
                        </div>
                        <div class="form-group">
                            <label>Batas Jumlah Riwayat yang Ditampilkan</label>
                            <input type="number" name="transaction_limit" class="form-control" value="{{ $settings['transaction_limit'] ?? 5 }}" placeholder="Misal: 5 atau 10" min="1" max="50" required>
                            <small style="color: #6b7280; display: block; margin-top: 0.5rem;">
                                *Menentukan berapa baris data transaksi terbaru yang muncul di tabel Panel Utama.
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Interval Pembaruan Otomatis (Detik)</label>
                            <select name="refresh_interval" class="form-control">
                                @php $interval = $settings['refresh_interval'] ?? 30; @endphp
                                <option value="15" {{ $interval == 15 ? 'selected' : '' }}>15 Detik</option>
                                <option value="30" {{ $interval == 30 ? 'selected' : '' }}>30 Detik</option>
                                <option value="60" {{ $interval == 60 ? 'selected' : '' }}>1 Menit</option>
                                <option value="0" {{ $interval == 0 ? 'selected' : '' }}>Manual (Matikan Auto-Refresh)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Batas Highlight Transaksi Besar (IDR)</label>
                            <input type="number" name="highlight_threshold" class="form-control" value="{{ $settings['highlight_threshold'] ?? 50000 }}" required>
                            <small style="color: #6b7280; display: block; margin-top: 0.5rem;">
                                *Transaksi di atas nilai ini akan mendapatkan penanda visual warna khusus di tabel riwayat.
                            </small>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn-save">Simpan Pengaturan</button>
                    </div>
                </form>

            </div>
        </main>
    </div>

</body>
</html>