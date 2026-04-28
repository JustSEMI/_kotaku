<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Setting;
use Carbon\Carbon;

class PanelController extends Controller
{
    public function index()
    {
        // HITUNG TOTAL SALDO
        $totalSaldo = Transaction::sum('amount');

        // PERHITUNGAN PEMASUKAN BULAN INI
        $pemasukanBulanIni = Transaction::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->sum('amount');
        
        // HITUNG JUMLAH TRANSAKSI BULAN INI
        $jumlahTransaksi = Transaction::whereMonth('created_at', Carbon::now()->month)->count();

        // AMBIL TRANSAKSI TERBARU
        $settings = Setting::pluck('value', 'key')->toArray();
        $transactionLimit = $settings['transaction_limit'] ?? 5;
        $riwayat = Transaction::latest()->take($transactionLimit)->get();

        // PROGRESS TARGET
        $totalSaldo = Transaction::sum('amount');
        $settings = Setting::pluck('value', 'key')->toArray();
        $targetSaldo = (int) ($settings['target_saldo'] ?? 5000000);
        $persentaseTarget = ($totalSaldo / $targetSaldo) * 100;
        if ($persentaseTarget > 100) $persentaseTarget = 100;

        // SETTING
        $settings = Setting::pluck('value', 'key')->toArray();
        $targetSaldo = $settings['target_saldo'] ?? 5000000;
        $refreshInterval = $settings['refresh_interval'] ?? 30;
        $highlightThreshold = (int) ($settings['highlight_threshold'] ?? 50000);

        // TARGET SALDO
        $persentaseTarget = ($totalSaldo / $targetSaldo) * 100;
        if ($persentaseTarget > 100) $persentaseTarget = 100;

        return view('panel', compact('totalSaldo', 'pemasukanBulanIni', 'jumlahTransaksi', 'targetSaldo', 'riwayat', 'persentaseTarget', 'refreshInterval', 'highlightThreshold'));
    }

    public function exportCsv()
    {
        $fileName = 'Laporan_KOTAKU_' . date('Y-m-d') . '.csv';
        $transactions = Transaction::latest()->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Waktu', 'ID Sensor', 'Status', 'Nominal (Rp)');

        $callback = function() use($transactions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns, ';'); 

            foreach ($transactions as $task) {
                fputcsv($file, array(
                    $task->created_at->format('d-m-Y H:i'),
                    $task->sensor_id,
                    $task->status,
                    number_format($task->amount, 0, ',', '.') 
                ), ';');
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
    
}