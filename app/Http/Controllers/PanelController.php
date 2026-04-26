<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
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
        $riwayat = Transaction::latest()->take(5)->get();

        // SEND DATA KE VIEW
        return view('panel', compact('totalSaldo', 'pemasukanBulanIni', 'jumlahTransaksi', 'riwayat'));
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