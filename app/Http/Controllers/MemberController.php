<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('members', ['users' => $user]);
    }

    public function detail(Request $request)
    {
        $user = User::where('email', $request->session()->get('username'))->first();
        return view('member.profil', ['user' => $user]);
    }

    public function listJson()
    {
        $user = User::all();

        return view('members', ['users' => json_encode($user)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->nama = $request->name;
        $user->password = Crypt::encryptString($request->password);
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
        return route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('member.edit', ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'email' => 'required|email|unique:users,email',
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
        return redirect('member/profil')->with('status', 'Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return Redirect('/member/profil')->with('status', 'Selamat anda berhasil dihapus!');
    }
}
