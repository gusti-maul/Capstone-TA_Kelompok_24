<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $guru = \App\Models\Guru::all();
        return view("guru.guru", ['guru' => $guru]);
    }
    public function softdeleted()
    {
        $guru = \App\Models\Guru::onlyTrashed()->get();
        return view("guru.softdeleted", ['guru' => $guru]);
    }

    public function register()
    {
        if (Auth::user()->role === 'Admin') {
            return view("guru.register");
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
            $user->role = 'Guru';
            $user->name = $validatedData['nama'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt('12345678');
            $user->save();

            // Insert guru
            $request->request->add(['user_id' => $user->id]);
            $guru = \App\Models\Guru::create($request->all());

            return redirect('/guru')->with('success', 'Guru berhasil ditambahkan!');
        }
    }


    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $guru = \App\Models\Guru::onlyTrashed()
                ->where('id', $id)
                ->first();

            if ($guru) {
                $user_id = $guru->user_id;

                $guru->restore();

                if ($user_id) {
                    $user = \App\Models\User::onlyTrashed()
                        ->where('id', $user_id)
                        ->first();

                    if ($user) {
                        $user->restore();
                    }
                }

                return redirect('/guru/terhapus')->with('success', 'Guru berhasil di-restore beserta data akunnya');
            } else {
                return redirect('/guru/terhapus')->with('error', 'Guru gagal di-restore');
            }
        }
    }


    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
        $guru = \App\Models\Guru::findOrFail($id);
        $user_id = $guru->user_id;

        if ($guru->delete()) {
            $user = \App\Models\User::findOrFail($user_id);
            $user->delete();
            return redirect('/guru')->with('success', 'Guru berhasil di hapus beserta data akunnya');
        } else {
            return redirect('/guru')->with('error', 'Guru gagal di hapus');
        }}
    }

    public function edit($id)
    {
        if (Auth::user()->role === 'Admin') {
        $users = User::all();
        $guru = \App\Models\Guru::find($id);
        return view('/guru/edit', compact( 'users', 'guru'));}
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Guru') {
        $guru = \App\Models\Guru::find($id);
        $guru->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('/guru/' . $id . '/profile')->with('success', 'Data Guru Berhasil Diperbarui');}
    }

    public function profile($id)
    {
        $guru = \App\Models\Guru::find($id);
        return view("guru.profile", ['guru' => $guru]);
    }


    public function myprofile()
    {
        $guru = Guru::all();
        return view("guru.myprofile", ['guru' => $guru]);
    }


    public function guruedit($id)
    {
        if (Auth::user()->role === 'Guru') {

            $users = User::all();
            $guru = \App\Models\Guru::find($id);
            return view('/guru/guruedit', compact('users', 'guru'));
        }
    }

    public function guruupdate(Request $request, $id)
    {
        if (Auth::user()->role === 'Guru') {

            $guru = \App\Models\Guru::find($id);
            $guru->update($request->all());
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $guru->avatar = $request->file('avatar')->getClientOriginalName();
                $guru->save();
            }
            return redirect('/guru/profile')->with('success', 'Data Guru Berhasil Diperbarui');
        }
    }

}
