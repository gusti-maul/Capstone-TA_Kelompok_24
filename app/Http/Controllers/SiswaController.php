<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = \App\Models\Siswa::all();
        return view("siswa.siswa", ['siswa' => $siswa]);
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

    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('/siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {

        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('success', 'User has been Updated');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view("siswa.profile", ['siswa' => $siswa]);
    }

    public function nilai($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $matapelelajaran = \App\Models\Mapel::all();
        // dd($mapel);
        return view("nilai.nilai", ['siswa' => $siswa, 'matapelelajaran' => $matapelelajaran]);
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('success', 'User has been delete');
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = \App\Models\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
        return redirect('siswa/' . $idsiswa . '/nilai')->with('error', 'Mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai_pengetahuan'=> $request->nilai_pengetahuan, 'nilai_keterampilan' => $request->nilai_keterampilan]);
        return redirect('siswa/' . $idsiswa . '/nilai')->with('success', 'niai berhasil di input');
    }
}
