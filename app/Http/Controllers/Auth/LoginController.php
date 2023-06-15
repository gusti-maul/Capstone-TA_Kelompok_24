<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'Admin') {
                $namaAdmin = auth()->user()->name;
                return redirect('/dashboard')->with('success', 'Selamat Datang ' . $namaAdmin);
            } else if (auth()->user()->role == 'Guru') {
                $namaGuru = auth()->user()->name;
                return redirect('/dashboard')->with('success', 'Selamat Datang ' . $namaGuru);
            } else if (auth()->user()->role == 'Kepala Sekolah') {
                $namaKepsek = auth()->user()->name;
                return redirect('/dashboard')->with('success', 'Selamat Datang ' . $namaKepsek);
            } else if (auth()->user()->role == 'Siswa') {
                $namaSiswa = auth()->user()->name;
                return redirect('/dashboard')->with('success', 'Selamat Datang ' . $namaSiswa);
            }
        }

        return redirect('/')->with('error', 'Login failed, email address or password are incorrect');
    }
}
