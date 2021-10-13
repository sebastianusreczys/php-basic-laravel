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
        $user = User::where('email', $request->email)->first();
        $decrypted = Crypt::decryptString($user->password);        // $decrypted2 = Crypt::decryptString($encrip);

        if ($user->exists()) {
            if ($decrypted == $request->password) {
                $request->session()->put('username', $request->email);
                return view('member/list');
            }
        }
    }
}
