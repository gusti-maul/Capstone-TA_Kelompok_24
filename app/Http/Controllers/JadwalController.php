<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tapel;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $kelas = \App\Models\Kelas::all();
        $jadwal = jadwal::all();
        return view("jadwal.semua", ['mapel' => $mapel, 'kelas' => $kelas, 'jadwal' => $jadwal]);
    }
    public function kelasx(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'X')->get();
        $jadwal = \App\Models\Jadwal::whereIn('kelas_id', $kelas->pluck('id'))->get();

        return view("jadwal.kelasx", compact('mapel', 'kelas', 'jadwal'));
    }
    public function kelasxi(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'XI')->get();
        $jadwal = \App\Models\Jadwal::whereIn('kelas_id', $kelas->pluck('id'))->get();

        return view("jadwal.kelasxi", compact('mapel', 'kelas', 'jadwal'));
    }
    public function kelasxii(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'XII')->get();
        $jadwal = \App\Models\Jadwal::whereIn('kelas_id', $kelas->pluck('id'))->get();

        return view("jadwal.kelasxii", compact('mapel', 'kelas', 'jadwal'));
    }

    public function create()
    {
        if (Auth::user()->role === 'Admin') {
            $mapel = Mapel::all();
            $kelas = Kelas::all();
            return view('jadwal.tambah', compact('mapel', 'kelas'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $jadwal = new jadwal;
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->mapel_id = $request->mapel_id;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->save();

        return redirect('jadwalguru')->with('success', 'Jadwal Pelajaran berhasil ditambahkan');
    }

    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $jadwal = jadwal::findOrFail($id);
            $jadwal->delete($jadwal);
            return redirect()->back()->with('success', 'Jadwal Pelajaran berhasil dihapus');
        }
    }

    public function edit($id)
    {
        $jadwal = jadwal::findOrFail($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('jadwal.edit', compact('jadwal', 'mapel', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = jadwal::findOrFail($id);

        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $jadwal->hari = $request->input('hari');
        $jadwal->jam = $request->input('jam');
        $jadwal->mapel_id = $request->input('mapel_id');
        $jadwal->kelas_id = $request->input('kelas_id');
        $jadwal->save();

        return redirect('/jadwalpelajaran')->with('success', 'Jadwal Pelajaran berhasil diperbarui');
    }

    public function show($id)
    {
        $jadwal = jadwal::findOrFail($id);
        return view('jadwal.detail', compact('jadwal'));
    }
}
