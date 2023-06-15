<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardUserAdminController extends Controller
{

    // public function index()
    // {
    //     $this->authorize('admin');
    //     return view('admin.user', ['users' => User::where('role', 1)->get()]);
    // }

    public function create()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
            'role' => ['required', 'in:Admin']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role']
        ]);

        return redirect('/admin')->with('success', 'Admin berhasil ditambahkan');
    }


    public function destroy(User $user)
    {
        if (Auth::user()->role === 'Admin') {
            User::destroy($user->id);
            return redirect('/admin/user')->with('success', 'Admin berhasil dihapus');
        }
    }

    public function daftar()
    {
        $daftar_user = \App\Models\User::whereNotIn('role', ['Admin'])->get();
        return view('/users/datauser', ['daftar_user' => $daftar_user]);
    }

    public function admin()
    {
        $daftar_user = \App\Models\User::where('role', 'Admin')->get();
        return view('/admin/admin', ['daftar_user' => $daftar_user]);
    }
    public function softdeleted()
    {
        $daftar_user = \App\Models\User::onlyTrashed()
        ->where('role', 'Admin')
        ->get();

        return view('/admin/softdelete', ['daftar_user' => $daftar_user]);
    }

    public function edit($id)
    {
        if (Auth::user()->role === 'Admin') {
            $daftar_user = \App\Models\User::find($id);
            return view('/users/edit', ['daftar_user' => $daftar_user]);
        }
    }

    // public function update(Request $request, $id)
    // {
    //     if (Auth::user()->role === 'Admin') {
    //         $daftar_user = \App\Models\User::find($id);
    //         $daftar_user->update($request->all());
    //         return redirect('/user')->with('success', 'Data User berhasil diperbarui');
    //     }
    // }
    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin') {
            $daftar_user = \App\Models\User::find($id);

            // Validasi username unik
            $request->validate([
                'username' => 'required|unique:users,username,' . $daftar_user->id,
            ]);

            // Validasi email unik
            $request->validate([
                'email' => 'required|unique:users,email,' . $daftar_user->id,
            ]);

            // Mengenkripsi password jika ada perubahan
            if (!empty($request->password)) {
                $request->validate([
                    'password' => 'string|min:8',
                ]);
                $request->merge([
                    'password' => bcrypt($request->password),
                ]);
            } else {
                $request->request->remove('password');
            }

            $daftar_user->update($request->all());
            return redirect('/user')->with(
                'success',
                'Data User berhasil diperbarui'
            );
        }
    }





    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $daftar_user = \App\Models\User::find($id);
            $daftar_user->delete($daftar_user);
            return redirect()->back()->with('success', 'User berhasil dihapus.');

        }
    }
    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $user = \App\Models\User::onlyTrashed()
            ->where('id', $id)
                ->restore();
            return redirect()->back()->with('success', 'Admin berhasil di-restore.');
        }
    }
    public function hapuspermanen($id)
    {
        if (Auth::user()->role === 'Admin') {
            $user = \App\Models\User::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
            return redirect()->back()->with('success', 'Admin berhasil dihapus secara permanen.');
        }
    }

}
