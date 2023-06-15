<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepalaSekolahController extends Controller
{
    public function index()
    {
        $kepsek = \App\Models\KepalaSekolah::all();
        return view("kepalasekolah.kepalasekolah", ['kepsek' => $kepsek]);
    }
    public function softdeleted()
    {
        $kepsek = \App\Models\KepalaSekolah::onlyTrashed()->get();
        return view("kepalasekolah.softdeleted", ['kepsek' => $kepsek]);
    }

    public function register()
    {
        if (Auth::user()->role === 'Admin') {

            return view("kepalasekolah.register");
        }
    }

    public function create(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // Validasi data input
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
            ]);

            // Insert user
            $user = new \App\Models\User;
            $user->role = 'Kepala Sekolah';
            $user->name = $validatedData['nama'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt('12345678');
            $user->save();

            // Insert kepsek
            $request->request->add(['user_id' => $user->id]);
            $kepsek = \App\Models\KepalaSekolah::create($request->all());

            return redirect('/kepalasekolah')->with('success', 'Kepala Sekolah has been added!');
        }
    }

    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $kepsek = \App\Models\KepalaSekolah::findOrFail($id);
            $user_id = $kepsek->user_id;

            if ($kepsek->delete()) {
                $user = \App\Models\User::findOrFail($user_id);
                $user->delete();
                return redirect('/kepalasekolah')->with('success', 'Kepala Sekolah berhasil di hapus beserta data akunnya');
            } else {
                return redirect('/kepalasekolah')->with('error', 'Kepala Sekolah gagal di hapus');
            }
        }
    }
    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $kepsek = \App\Models\KepalaSekolah::onlyTrashed()
                ->where('id', $id)
                ->first();

            if ($kepsek) {
                $user_id = $kepsek->user_id;

                $kepsek->restore();

                if ($user_id) {
                    $user = \App\Models\User::onlyTrashed()
                        ->where('id', $user_id)
                        ->first();

                    if ($user) {
                        $user->restore();
                    }
                }
                return redirect('/kepalasekolah/terhapus')->with('success', 'Kepala Sekolah berhasil di-restore beserta data akunnya');
            } else {
                return redirect('/kepalasekolah/terhapus')->with('error', 'Kepala Sekolah gagal di-restore');
            }
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Kepala Sekolah') {

            $users = User::all();
            $kepsek = \App\Models\KepalaSekolah::find($id);
            return view('/kepalasekolah/edit', compact('users', 'kepsek'));
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin') {

            $kepsek = \App\Models\KepalaSekolah::find($id);
            $kepsek->update($request->all());
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $kepsek->avatar = $request->file('avatar')->getClientOriginalName();
                $kepsek->save();
            }
            return redirect('/kepalasekolah/' . $id . '/profile')->with('success', 'Data Kepala Sekolah Berhasil Diperbarui');
        }
    }
    public function kepsekupdate(Request $request, $id)
    {
        if (Auth::user()->role === 'Kepala Sekolah') {
            $kepsek = \App\Models\KepalaSekolah::find($id);
            $kepsek->update($request->all());
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $kepsek->avatar = $request->file('avatar')->getClientOriginalName();
                $kepsek->save();
            }
            return redirect('/kepalasekolah/profile')->with('success', 'Data Kepala Sekolah Berhasil Diperbarui');
        }
    }

    public function profile($id)
    {
        $kepsek = \App\Models\KepalaSekolah::find($id);
        return view("kepalasekolah.profile", ['kepsek' => $kepsek]);
    }

    public function myprofile()
    {
        $kepsek = KepalaSekolah::all();
        return view("kepalasekolah.myprofile", ['kepsek' => $kepsek]);
    }


    public function kepsekedit($id)
    {
        if (Auth::user()->role === 'Kepala Sekolah') {

            $users = User::all();
            $kepsek = \App\Models\KepalaSekolah::find($id);
            return view('/kepalasekolah/kepalasekolahedit', compact('users', 'kepsek'));
        }
    }
}
