<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = \App\Models\Siswa::all();
        return view("siswa.siswa", ['data_siswa' => $data_siswa]);
    }
    public function register()
    {
        return view("siswa.register");
    }
    public function create(Request $request)
    {

        // insert user
        $user = new \App\Models\DaftarUser;
        $user->role = 'Siswa';
        $user->name = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        // $user->remember_token = str_random(60);
        $user->save();

        //insert siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());
        return redirect('/siswa')->with('success', 'Siswa has been added!');
    }
}
