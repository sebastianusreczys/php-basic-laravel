<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
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
    public function create()
    {
        return view('admin.form');
    }
    public function store(Request $request)
    {
        // return $request->file('gambar')->store('post-images');
        $user = new User();
        $user->nama = $request->name;
        $user->password = Crypt::encryptString($request->password);
        // $user->password = Hash::make($request->password);
        $user->no_hp = $request->nohandphone;
        $user->tanggal_lahir = $request->tangallahir;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jeniskelamin;
        $user->no_ktp = $request->noktp;
        $user->foto = $request->gambar;

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'nohandphone' => 'required',
            'tangallahir' => 'required',
            'email' => 'required|email|unique:users,email',
            'jeniskelamin' => 'required',
            'noktp' => 'required',
            'gambar' => 'image|file|max:1024',
        ]);
        if ($request->file('gambar')) {
            $user->foto = $request->file('gambar')->store('post-images');
        }
        $user->save();
        return redirect('admin/view');
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            'foto' => 'image|file|max:1024'
        ];
        $validateData = $request->validate($rules);
        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('gambar')->store('post-images');
        }
        User::where('id', $user->id)
            ->update(
                $validateData
            );
        return redirect('admin/view');
    }
    public function delete(User $user)
    {
        User::destroy($user->id);
        return Redirect('admin/view');
    }
}
