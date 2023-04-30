<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserAdminController extends Controller
{

    public function index()
    {
        $this->authorize('admin');
        return view('admin.user', ['users' => User::where('role', 1)->get()]);
    }

    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
            'role' => ['required', 'min:4']
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/user')->with('success', 'User has been added!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/user')->with('success', 'Admin has been deleted');
    }

    public function daftar()
    {
        $daftar_user = \App\Models\DaftarUser::all();
        return view('/users/datauser', ['daftar_user' => $daftar_user]);
    }

    public function edit($id)
    {
        $daftar_user = \App\Models\DaftarUser::find($id);
        return view ('/users/edit', ['daftar_user' => $daftar_user] );
    }

    public function update(Request $request, $id)
    {
        $daftar_user = \App\Models\DaftarUser::find($id);
        $daftar_user->update($request->all());
        return redirect('/user')->with('success', 'User has been Updated');
    }

    public function delete($id)
    {
        $daftar_user = \App\Models\DaftarUser::find($id);
        $daftar_user->delete($daftar_user);
        return redirect('/user')->with('success', 'User has been delete');
        
    }
}
