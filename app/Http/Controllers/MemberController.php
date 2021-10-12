<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        return view('member.list', ['users' => $user]);
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
        // $user->password = Hash::make($request->password);
        $user->no_hp = $request->nohandphone;
        $user->tanggal_lahir = $request->tangallahir;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jeniskelamin;
        $user->no_ktp = $request->noktp;
        $user->foto = $request->gambar;
        $user->save();
        return redirect('member/list');
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
        return redirect('member/list');
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
        return Redirect('/member/list');
    }
}
