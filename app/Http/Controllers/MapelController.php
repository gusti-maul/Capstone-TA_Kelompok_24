<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        $tapel = \App\Models\Tapel::all();
        $guru = \App\Models\Guru::all();
        return view("mapel.index", ['mapel' => $mapel, 'guru' => $guru, 'tapel' => $tapel]);
    }
    public function softdeleted()
    {
        $tapel = \App\Models\Tapel::all();
        $guru = \App\Models\Guru::all();
        $mapel = \App\Models\Mapel::onlyTrashed()->get();
        return view("mapel.softdeleted", ['mapel' => $mapel, 'guru' => $guru, 'tapel' => $tapel]);
    }

    public function searchMapel(Request $request)
    {
        $tapel = Tapel::all();
        $guru = \App\Models\Guru::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $mapel = \App\Models\Mapel::where('tapel_id', $tahunAjaran)->get();
        } else {
            $mapel = \App\Models\Mapel::all();
        }
        return view("mapel.index", ['mapel' => $mapel, 'guru' => $guru, 'tapel' => $tapel]);
    }

    public function detail($id)
    {
        $mapel = \App\Models\Mapel::find($id);

        if (!$mapel) {
            return redirect()->back()->with('error', 'Mapel tidak ditemukan');
        }

        // Ambil data terkait yang dibutuhkan (misalnya guru, tapel, dll)
        $guru = $mapel->guru;
        $tapel = $mapel->tapel;

        return view('mapel.detail', compact('mapel', 'guru', 'tapel'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            $validatedData = $request->validate([
                'kode_mapel' => ['required', 'string', 'max:255', 'unique:mapel'],
                'mapel' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:255',
            ]);

            $existingMapel = \App\Models\Mapel::where('mapel', $validatedData['mapel'])
            ->where('kode_mapel', $validatedData['kode_mapel'])
            ->where('guru_id', $request->input('guru_id'))
            ->where('tapel_id', $request->input('tapel_id'))
            ->first();

            if ($existingMapel) {
                return redirect('/mapel')->with('error', 'Mata pelajaran dengan sudah ada.');
            }

            $mapel = new \App\Models\Mapel($validatedData);
            $mapel->guru_id = $request->input('guru_id');
            $mapel->tapel_id = $request->input('tapel_id');
            $mapel->save();

            return redirect('/mapel')->with('success', 'Mata pelajaran berhasil ditambahkan.');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin') {
            $validatedData = $request->validate([
                'kode_mapel' => 'required|string|max:255',
                'mapel' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:255',
                'guru_id' => 'required|exists:guru,id',
                'tapel_id' => 'required|exists:tapel,id',
            ]);

            $mapel = Mapel::findOrFail($id);
            $mapel->update($validatedData);

            // Mengaitkan mapel dengan guru berdasarkan ID guru yang dipilih pada form
            $guru = Guru::find($validatedData['guru_id']);
            $mapel->guru()->associate($guru);

            // Mengaitkan mapel dengan tahun pelajaran berdasarkan ID tahun pelajaran yang dipilih pada form
            $tapel = Tapel::find($validatedData['tapel_id']);
            $mapel->tapel()->associate($tapel);

            $mapel->save();

            return redirect("/mapel")->with('success', 'Mata Pelajaran berhasil diperbarui');
        }
    }


    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {

            $mapel = \App\Models\Mapel::find($id);
            $mapel->delete($mapel);
            return redirect('/mapel')->with('success', 'Mata pelajaran berhasil dihapus');
        }
    }
    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $mapel = \App\Models\Mapel::onlyTrashed()
                ->where('id', $id)
                ->restore();
            return redirect('/mapel/terhapus')->with('success', 'Mata Pelajaran berhasil di-restore.');
        }
    }
    
    public function edit($id)
    {
        if (Auth::user()->role === 'Admin') {
            $mapel = \App\Models\Mapel::findOrFail($id);
            $guru = \App\Models\Guru::all();
            $tapel = \App\Models\Tapel::all();
            $kelas = \App\Models\Kelas::all();

            return view('/mapel/edit', compact('mapel', 'guru', 'tapel', 'kelas'));
        }
    }


}
