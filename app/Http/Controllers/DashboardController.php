<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;

class DashboardController extends Controller
{

    public function index()
    {
        $siswaX = Siswa::whereHas('kelas', function ($query) {
            $query->where('kelas', 'X');
        })->count();

        $siswaXI = Siswa::whereHas('kelas', function ($query) {
            $query->where('kelas', 'XI');
        })->count();

        $siswaXII = Siswa::whereHas('kelas', function ($query) {
            $query->where('kelas', 'XII');
        })->count();

        $siswaIslam = Siswa::where('agama', 'Islam')->count();

        $siswaHindu = Siswa::where('agama', 'Hindu')->count();

        $siswaKatolik = Siswa::where('agama', 'Khatolik')->count();

        $siswaBudha = Siswa::where('agama', 'Budha')->count();

        $siswaKristen = Siswa::where('agama', 'Kristen')->count();

        $siswaLainnya = Siswa::where('agama', '!=', 'Islam')
            ->where('agama', '!=', 'Hindu')
            ->where('agama', '!=', 'Khatolik')
            ->where('agama', '!=', 'Budha')
            ->where('agama', '!=', 'Kristen')
            ->count();

        $siswaCount = Siswa::count();
        $guruCount = Guru::count();
        $kepsek = KepalaSekolah::count();
        $adminCount = User::where('role', 'Admin')->count();
        $kelasCount = Kelas::count();

        return view('chart.dashboard', compact('siswaX', 'siswaXI', 'siswaXII', 'siswaCount', 'kepsek', 'guruCount', 'adminCount', 'kelasCount', 'siswaIslam', 'siswaHindu', 'siswaKatolik', 'siswaBudha', 'siswaKristen',  'siswaLainnya'));
    }
}
