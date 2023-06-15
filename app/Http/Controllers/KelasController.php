<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use App\Models\zUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::all();
        return view("kelas.kelas", ['kelas' => $kelas, 'tapel' => $tapel]);
    }
    public function softdeleted()
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::onlyTrashed()->get();
        return view("kelas.softdeleted", ['kelas' => $kelas, 'tapel' => $tapel]);
    }
    public function searchKelas(Request $request)
    {
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $kelas = \App\Models\Kelas::where('tapel_id', $tahunAjaran)->get();
        } else {
            $kelas = \App\Models\Kelas::all();
        }
        return view("kelas.kelas", ['kelas' => $kelas, 'tapel' => $tapel]);
    }


    public function kelas(Request $request)
    {
        return view("kelas.index");
    }

    public function kelasx(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'X')->get();
        return view("kelas.kelasx", ['kelas' => $kelas, 'tapel' => $tapel]);
    }
    public function searchKelasX(Request $request)
    {
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $kelas = \App\Models\Kelas::where('tapel_id', $tahunAjaran)
                ->where('kelas', 'X')
                ->get();
        } else {
            $kelas = \App\Models\Kelas::where('kelas', 'X')->get();
        }

        return view("kelas.kelasx", ['kelas' => $kelas, 'tapel' => $tapel]);
    }


    public function kelasxi(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'XI')->get();
        return view("kelas.kelasxi", ['kelas' => $kelas, 'tapel' => $tapel]);
    }
    public function searchKelasXI(Request $request)
    {
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $kelas = \App\Models\Kelas::where('tapel_id', $tahunAjaran)
                ->where('kelas', 'XI')
                ->get();
        } else {
            $kelas = \App\Models\Kelas::where('kelas', 'XI')->get();
        }

        return view("kelas.kelasx", ['kelas' => $kelas, 'tapel' => $tapel]);
    }

    public function kelasxii(Request $request)
    {
        $tapel = Tapel::all();
        $kelas = \App\Models\Kelas::where('kelas', 'XII')->get();
        return view("kelas.kelasxii", ['kelas' => $kelas, 'tapel' => $tapel]);
    }
    public function searchKelasXII(Request $request)
    {
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $kelas = \App\Models\Kelas::where('tapel_id', $tahunAjaran)
                ->where('kelas', 'XII')
                ->get();
        } else {
            $kelas = \App\Models\Kelas::where('kelas', 'XII')->get();
        }

        return view("kelas.kelasx", ['kelas' => $kelas, 'tapel' => $tapel]);
    }


    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'kelas' => 'required|string|max:255',
    //         'nama_kelas' => 'required|string|max:255',
    //     ]);
    //     $kelas = \App\Models\kelas::create($validatedData);
    //     return redirect('/kelas')->with('success', 'Kelas berhasil ditambahkan.');
    // }

    // public function delete($id)
    // {
    //     $kelas = \App\Models\Kelas::find($id);
    //     $kelas->delete($kelas);
    //     return redirect('/kelas')->with('success', 'Kelas berhasil di hapus');
    // }

    public function create()
    {
        if (Auth::user()->role === 'Admin') {
            $guru = Guru::all();
            $tapel = Tapel::all();
            return view('kelas.register', compact('guru', 'tapel'));
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            $validatedData = $request->validate([
                'kelas' => 'required',
                'nama_kelas' => 'required',
                'guru_id' => 'required|exists:guru,id',
                'tapel_id' => 'required|exists:tapel,id',
            ]);

            // Cek apakah kelas sudah ada di database berdasarkan nama kelas, guru, dan tahun pelajaran
            if (Kelas::where('kelas', $validatedData['kelas'])
                ->where('nama_kelas', $validatedData['nama_kelas'])
                ->where('tapel_id', $validatedData['tapel_id'])
                ->exists()
            ) {
                return redirect("/kelas/all")->with('error', 'Kelas sudah ada.');
            }

            // Buat kelas baru dan isi dengan data dari form
            $kelas = new Kelas();
            $kelas->kelas = $validatedData['kelas'];
            $kelas->nama_kelas = $validatedData['nama_kelas'];
            $kelas->kelas = $validatedData['kelas'];
            $kelas->guru_id = $validatedData['guru_id'];
            $kelas->tapel_id = $validatedData['tapel_id'];

            // Mengaitkan kelas dengan guru berdasarkan ID guru yang dipilih pada form
            $guru = Guru::find($validatedData['guru_id']);
            $kelas->guru()->associate($guru);

            // Mengaitkan kelas dengan tahun pelajaran berdasarkan ID tahun pelajaran yang dipilih pada form
            $tapel = Tapel::find($validatedData['tapel_id']);
            $kelas->tapel()->associate($tapel);

            $kelas->save();

            return redirect("/kelas/all")->with('success', 'Kelas berhasil ditambahkan');
        }
    }

    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $kelas = \App\Models\Kelas::find($id);
            $kelas->delete($kelas);
            return redirect('/kelas/all')->with('success', 'Kelas berhasil di hapus');
        }
    }
    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $kelas = \App\Models\Kelas::onlyTrashed()
                ->where('id', $id)
                ->restore();
            return redirect('/kelas/terhapus')->with('success', 'Kelas berhasil di-restore.');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role === 'Admin') {

            $kelas = Kelas::findOrFail($id);
            $tapel = Tapel::all();
            $guru = Guru::all();
            $siswa = Siswa::all();

            return view('kelas.edit', compact('kelas', 'tapel', 'guru', 'siswa'));
        }
    }
    
    public function detail($id)
    {
        $kelas = \App\Models\Kelas::find($id);
        $siswa = \App\Models\Siswa::where('kelas_id', $id)->get();
        return view("siswa.kelassiswa", ['siswa' => $siswa, 'kelas' => $kelas]);
    }



    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin') {
            $validatedData = $request->validate([
                'kelas' => 'required',
                'nama_kelas' => 'required',
                'guru_id' => 'required|exists:guru,id',
                'tapel_id' => 'required|exists:tapel,id',
            ]);

            $kelas = Kelas::findOrFail($id);

            $kelas->update($validatedData);

            return redirect("/kelas/all")->with('success', 'Kelas berhasil diperbarui');
        }
    }





}
