<?php

namespace App\Http\Controllers;

use \App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    // buat menampilkan data member
    public function index()
    {
        $user = User::all();
        return view('admin.index', ['users' => $user]);
    }
    // untuk edit data member
    public function edit(User $user)
    {
        return view('admin.edit', ['users' => $user]);
    }
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
                'nama' => $request->name,
                'password' => $request->password,
                'no_hp' => $request->nohandphone,
                'tanggal_lahir' => $request->tangallahir,
                'email' => $request->email,
                'jenis_kelamin' => $request->jeniskelamin,
                'no_ktp' => $request->noktp,
                'foto' => $request->gambar
            ]);
        return redirect('admin/view');
    }
    public function delete(User $user)
    {
        User::destroy($user->id);
        return Redirect('admin/view');
    }
}
