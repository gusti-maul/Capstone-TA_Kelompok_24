<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|string|confirmed',
        ]);
        $currentPassword = auth()->user()->password;
        $oldPassword = $request->old_password;
        if (Hash::check($oldPassword, $currentPassword)) {
            $id = auth()->user()->id;
            User::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('success', 'Password berhasil diganti');
        } else {
            return back()->with('error', 'Password lama tidak cocok');
        }
    }
}
