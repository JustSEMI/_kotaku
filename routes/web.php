<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index']);
Route::post('/login-process', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/panel', function () {
    if (!session('is_logged_in')) return redirect('/');
    return view('panel');
});

Route::get('/report', function () {
    if (!session('is_logged_in')) return redirect('/');
    return view('report');
});

Route::get('/status', function () {
    if (!session('is_logged_in')) return redirect('/');
    return view('status');
});

Route::get('/settings', function () {
    if (!session('is_logged_in')) return redirect('/');
    return view('settings');
});