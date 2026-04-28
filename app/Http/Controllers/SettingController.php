<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // GET
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('settings', compact('settings'));
    }

    public function update(Request $request)
    {
        // SAVE SETTING KE DATABASE
        Setting::updateOrCreate(['key' => 'target_saldo'], ['value' => $request->target_saldo]);
        Setting::updateOrCreate(['key' => 'refresh_interval'], ['value' => $request->refresh_interval]);
        Setting::updateOrCreate(['key' => 'transaction_limit'], ['value' => $request->transaction_limit]);
        Setting::updateOrCreate(['key' => 'highlight_threshold'], ['value' => $request->highlight_threshold]);

        // VIEW
        return redirect()->back()->with('success', 'Konfigurasi berhasil diperbarui!');
    }
}