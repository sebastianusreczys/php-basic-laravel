<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function authenticate(Request $requet)
    {
        $credentials = $requet->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $requet->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'Login gagal');
    }
}
