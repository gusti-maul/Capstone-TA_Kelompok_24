<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        return view('landingpage.home');
    }

    public function about()
    {
        return view('landingpage.about');
    }

    public function portofolio()
    {
        return view('landingpage.portofolio');
    }

    public function contact()
    {
        return view('landingpage.contact');
    }

    public function prestasi()
    {
        return view('landingpage.prestasi');
    }

    public function siswabaru()
    {
        return view('landingpage.siswabaru');
    }
}
