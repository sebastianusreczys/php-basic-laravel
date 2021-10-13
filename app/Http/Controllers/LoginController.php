<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

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

    public function loginAdmin(Request $request)
    {
        if ($request->session()->has('is_admin')) {
            if ($request->session()->get('is_admin')) {
                return back();
            }
        } else {
            return route('login');
        }
    }

    public function authenticate(Request $request) {    
        
            $queryUserNonAdmin = ['email' => $request->email, 'is_admin' => false];
            $queryUserAdmin = ['email' => $request->email, 'password' => $request->password , 'is_admin' => true];
            
            $user = User::where($queryUserNonAdmin)->first();
            $userAdmin = User::where($queryUserAdmin)->first();

            if ($user) {
                if (Crypt::decryptString($user->password) == $request->password) {
                    $request->session()->put('username', $request->email);
                    $request->session()->put('email', $user->email);
                    return redirect()->route('profil');
                } else {
                    $request->session()->flash('login-error', 'Password Salah');
                    return back();
                }
            }
            elseif ($userAdmin){
                return route('admin');
            }
            else{
                $request->session()->flash('login-error', 'User tidak Terdaftar!');
                return back();
            }
    }

    public function logout(){
        if (session()->has('username')) {
            session()->forget('username');
            session()->forget('is_admin');
            session()->flash('login-success', 'Anda Telah Logout');
        }
        
        return redirect('auth/login');

    }


}
