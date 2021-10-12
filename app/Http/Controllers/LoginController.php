<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use SebastianBergmann\Environment\Console;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        // $decrypted = $request->input('password');
        // $encrip = Crypt::encryptString($request->password);
        // $decrypted2 = Crypt::decryptString($encrip);
        // $user      = User::where('email', $request->email)->exists();
        // if ($user) {
        //     // if ($decrypted == $encrip) {
        //     return "user ada";
        //     // Auth::login($user);
        //     // return $encrip .  '<br>' . $decrypted .  '<br>' . $decrypted2;
        // }
        // }

        // return $this->sendFailedLoginResponse($request);
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return "berhasil";
        }

        return "gagal";
    }
}
