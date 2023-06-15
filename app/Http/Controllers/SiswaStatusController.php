<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiswaStatusController extends Controller
{
    public function kelas(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::all();
        return view("statussiswa.status", ['kelas' => $kelas, 'tapel' => $tapel]);
    }

    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('statussiswa.index', compact('siswa', 'kelas'));
    }

    public function tahunajaran(Request $request)
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

        return view('statussiswa.status', compact('siswa', 'kelas', 'tapel'));
    }

    public function kelulusan($id)
    {
        $kelas = \App\Models\Kelas::with('tapel')->find($id);
        $siswa = \App\Models\Siswa::where('kelas_id', $id)->get();
        $daftarKelas = \App\Models\Kelas::all(); // Tambahkan ini untuk mendapatkan daftar kelas
        return view("statussiswa.index", ['siswa' => $siswa, 'daftarKelas' => $daftarKelas, 'kelas' => $kelas]);
    }

    public function ubahstatus($id)
    {
        $kelas = \App\Models\Kelas::with('tapel')->find($id);
        $siswa = \App\Models\Siswa::where('kelas_id', $id)->get();
        $daftarKelas = \App\Models\Kelas::all(); // Tambahkan ini untuk mendapatkan daftar kelas
        return view("statussiswa.status_lainnya", ['siswa' => $siswa, 'daftarKelas' => $daftarKelas, 'kelas' => $kelas]);
    }

    public function proseskelulusan(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // Validasi input
            $request->validate([
                'siswa_id' => 'required|array',
                'siswa_id.*' => 'exists:siswa,id',
            ]);

            // Ambil siswa yang dipilih
            $siswaIds = $request->input('siswa_id');
            $siswaLulus = Siswa::whereIn('id', $siswaIds)->get();

            // Cek apakah siswa yang dipilih adalah kelas XII
            $siswaTidakKelasXII = $siswaLulus->filter(function ($siswa) {
                return $siswa->kelas->kelas !== 'XII';
            });

            if ($siswaTidakKelasXII->count() > 0) {
                return redirect()->back()->with('error', 'Proses kelulusan hanya untuk siswa kelas XII.');
            }

            // Ubah status siswa menjadi "Lulus"
            foreach ($siswaLulus as $siswa) {
                $siswa->status_siswa = 'Lulus';
                $siswa->save();
            }

            // Redirect atau tampilkan pesan berhasil
            return redirect()->back()->with('success', 'Status siswa berhasil diubah menjadi lulus.');
        }
    }


    public function prosesStatusSiswa(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // Validasi input
            $request->validate([
                'siswa_id' => 'required|array',
            ]);

            // Ambil data siswa dari form
            $siswaIds = array_keys($request->input('siswa_id'));

            // Looping untuk mengubah status siswa
            foreach ($siswaIds as $siswaId) {
                // Temukan siswa berdasarkan ID
                $siswa = Siswa::find($siswaId);

                // Jika siswa ditemukan, ubah statusnya
                if ($siswa) {
                    $status = $request->input('siswa_id.' . $siswaId);

                    switch ($status) {
                        case 'Aktif':
                            $siswa->status_siswa = 'Aktif';
                            break;
                        case 'Pindah':
                            $siswa->status_siswa = 'Pindah';
                            break;
                        case 'Keluar':
                            $siswa->status_siswa = 'Keluar';
                            break;
                        default:
                            // Jika pilihan tidak valid, lewati siswa ini
                            continue 2;
                    }

                    $siswa->save();
                }
            }

            // Redirect atau tampilkan pesan berhasil
            return redirect()->back()->with('success', 'Status siswa berhasil diubah.');
        }
    }
}
