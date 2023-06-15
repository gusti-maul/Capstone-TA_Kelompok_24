<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tapel;
use App\Models\JadwalUjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JadwalUjianController extends Controller
{
    public function index(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $kelas = \App\Models\Kelas::all();
        $jadwalujian = JadwalUjian::all();
        return view("jadwalujian.semua", ['mapel' => $mapel, 'kelas' => $kelas, 'jadwalujian' => $jadwalujian]);
    }

    public function create()
    {
        if (Auth::user()->role === 'Admin') {
            $mapel = Mapel::all();
            $kelas = Kelas::all();
            return view('jadwalujian.tambah', compact('mapel', 'kelas'));
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal_ujian' => 'required|date',
            'jam' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $tanggalUjian = $request->tanggal_ujian;
        $hari = Carbon::parse($tanggalUjian)->locale('id')->dayName;

        $jadwalUjian = new JadwalUjian;
        $jadwalUjian->tanggal_ujian = $tanggalUjian;
        $jadwalUjian->hari = $hari;
        $jadwalUjian->jam = $request->jam;
        $jadwalUjian->ruangan = $request->ruangan;
        $jadwalUjian->mapel_id = $request->mapel_id;
        $jadwalUjian->kelas_id = $request->kelas_id;
        $jadwalUjian->save();

        return redirect('jadwalujian')->with('success', 'Jadwal Ujian berhasil ditambahkan');
    }



    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $jadwalujian = JadwalUjian::findOrFail($id);
            $jadwalujian->delete($jadwalujian);
            return redirect()->back()->with('success', 'Jadwal ujian berhasil dihapus');
        }
    }

    public function edit($id)
    {
        $jadwalujian = JadwalUjian::findOrFail($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('jadwalujian.edit', compact('jadwalujian', 'mapel', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $jadwalUjian = JadwalUjian::findOrFail($id);

        $request->validate([
            'tanggal_ujian' => 'required|date',
            'jam' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $tanggalUjian = $request->input('tanggal_ujian');
        $hari = Carbon::parse($tanggalUjian)->locale('id')->dayName;

        $jadwalUjian->tanggal_ujian = $tanggalUjian;
        $jadwalUjian->hari = $hari;
        $jadwalUjian->ruangan = $request->ruangan;
        $jadwalUjian->jam = $request->input('jam');
        $jadwalUjian->mapel_id = $request->input('mapel_id');
        $jadwalUjian->kelas_id = $request->input('kelas_id');
        $jadwalUjian->save();

        return redirect('/jadwalujian')->with('success', 'Jadwal ujian berhasil diperbarui');
    }

    public function show($id)
    {
        $jadwalujian = JadwalUjian::findOrFail($id);
        return view('jadwalujian.detail', compact('jadwalujian'));
    }
}
