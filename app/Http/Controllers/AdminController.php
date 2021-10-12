<?php

namespace App\Http\Controllers;

use \App\Models\Member;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // buat menampilkan data member
    public function index()
    {
        $member = Member::all();
        return view('admin.index', ['members' => $member]);
    }
    // untuk edit data member
    public function edit(Member $member)
    {
        return view('admin.edit', ['members' => $member]);
    }
    public function update(Request $request, Member $member)
    {
        Member::where('id', $member->id)
            ->update([
                'nama' => $request->nama,
                'no_hp' => $request->nohandphone,
                'tanggal_lahir' => $request->tangal_lahir,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_ktp' => $request->noktp,
                'foto' => $request->foto
            ]);
        return redirect('/admin/view');
    }
}
