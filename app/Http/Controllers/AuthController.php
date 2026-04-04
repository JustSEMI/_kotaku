<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function index(){
        if (session()->has('is_logged_in')) {
            return redirect('/panel');
        }
        return view('auth.login');
    }
    public function login(Request $request){
        $adminUser = env ('ADMIN_USER');
        $adminPassword = env ('ADMIN_PASSWORD');
    
        if ($request->username === $adminUser && $request->password === $adminPassword) {
            session(['is_logged_in' => true, 'user' => $request->username]);
            return redirect('/panel');
        }

        return back()->with('error', 'Username atau password salah, bro!');
    }
    public function logout() {
        session()->forget(['is_logged_in', 'user']);
        return redirect('/');
    }
}