<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        // menampilkan form input
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menampilkan form
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

        // $validated = $request->validate([
        //     'name' => ['required'],
        //     'password' => ['required'],
        //     'no_hp' => ['required'],
        //     'tanggal_lahir' => ['required'],
        //     'email' => ['required|email:dns|unique:members'],
        //     'jenis_kelamin' => ['required'],
        //     'no_ktp' => ['required'],
        //     'foto' => ['required']
        // ]);

        // $validated['password'] = Hash::make($validated['password']);
        // Member::created($validated);


        $member = new Member();
        $member->nama = $request->name;
        $member->password = $request->password;
        $member->no_hp = $request->nohandphone;
        $member->tanggal_lahir = $request->tangallahir;
        $member->email = $request->email;
        $member->jenis_kelamin = $request->jeniskelamin;
        $member->no_ktp = $request->noktp;
        $member->foto = $request->gambar;
        $member->save();
        return redirect('member.konfirmasi');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
