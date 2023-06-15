<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KenaikanKelasController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('kenaikankelas.index', compact('siswa', 'kelas'));
    }

    public function kenaikankelas(Request $request)
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $kelas = Kelas::whereHas('tapel', function ($query) use ($tahunAjaran) {
                $query->where('id', $tahunAjaran);
            })->get();
        }

        return view('kenaikankelas.kelas', compact('siswa', 'kelas', 'tapel'));
    }


    public function prosesKenaikanKelas(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // Validasi input
            $request->validate([
                'siswa_id' => 'required|array',
                'siswa_id.*' => 'exists:siswa,id',
                'kelas_id' => 'required|exists:kelas,id',
            ]);

            // Ambil siswa yang dipilih untuk naik kelas
            $siswaId = $request->input('siswa_id');
            $siswaNaikKelas = Siswa::whereIn('id', $siswaId)->get();

            // Ambil kelas tujuan berdasarkan ID yang dipilih
            $kelasTujuan = Kelas::findOrFail($request->input('kelas_id'));

            // Looping untuk memindahkan siswa ke kelas tujuan
            foreach ($siswaNaikKelas as $siswa) {
                $siswa->kelas_id = $kelasTujuan->id;
                $siswa->save();
            }

            // Redirect atau tampilkan pesan berhasil
            return redirect()->back()->with('success', 'Kenaikan kelas berhasil diproses.');
        }
    }

    public function kelas(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::all();
        return view("kenaikankelas.kelas", ['kelas' => $kelas, 'tapel' => $tapel]);
    }

    public function detail($id)
    {
        $kelas = \App\Models\Kelas::with('tapel')->find($id);
        $siswa = \App\Models\Siswa::where('kelas_id', $id)->get();
        $daftarKelas = \App\Models\Kelas::all(); // Tambahkan ini untuk mendapatkan daftar kelas
        return view("kenaikankelas.index", ['siswa' => $siswa, 'daftarKelas' => $daftarKelas, 'kelas' => $kelas]);
    }
}
