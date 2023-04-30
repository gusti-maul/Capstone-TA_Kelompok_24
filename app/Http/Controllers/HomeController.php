<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('siswa/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guruHome()
    {
        return view ('guru/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    public function kepsekHome()
    {
        return
        view('kepalasekolah/dashboard', [
            "title" => "Dashboard"
        ]);
    }
}
