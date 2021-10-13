<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->has('username')) {
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }
    public function authenticate(Request $request)
    {
        if ($request->session()->has('username')) {
            $request->session()->forget('username');
            return view('auth.login');
        } else {
            $matchThese = ['email' => $request->email, 'is_admin' => false];
            $user = User::where($matchThese)->first();

            if ($user) {

                if (Crypt::decryptString($user->password) == $request->password) {
                    $request->session()->put('username', $request->email);
                    $request->session()->put('email', $user->email);
                    return redirect()->route('list');
                } else {
                    return back()->withErrors('password', "Password Invalid!");
                }
            }
        }
    }
    // logout
    public function logout()
    {
        $request->session()->forget('username');
        return view('/');
    }
}
