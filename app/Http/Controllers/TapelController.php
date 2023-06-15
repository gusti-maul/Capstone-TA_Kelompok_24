<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TapelController extends Controller
{
    public function index()
    {
        $tapel = \App\Models\Tapel::all();
        return view("tapel.tapel", ['tapel' => $tapel]);
    }
    public function softdeleted()
    {
        $tapel = \App\Models\Tapel::onlyTrashed()->get();
        return view("tapel.softdeleted", ['tapel' => $tapel]);
    }
    public function store(Request $request)
    {
        if (Auth::user()->role === 'Admin') {

            $validatedData = $request->validate([
                'tapel_awal' => 'required|string|max:255',
                'tapel_akhir' => 'required|string|max:255',
                'semester' => 'required|string|max:255',
            ]);

            $tapel = $request->tapel_awal . '/' . $request->tapel_akhir;

            // cek apakah data sudah ada
            $tapelExist = Tapel::where('tapel', $tapel)->where('semester', $request->semester)->exists();

            if ($tapelExist) {
                return redirect('/tapel')->with('error', 'Tahun Akademik dan Semester sudah ada.');
            }

            $data = new Tapel;
            $data->tapel = $tapel;
            $data->semester = $request->semester;

            // simpan data ke database
            $data->save();
            return redirect('/tapel')->with('success', 'Tahun Akademik berhasil ditambahkan.');
        }
    }

    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $tapel = \App\Models\Tapel::onlyTrashed()
                ->where('id', $id)
                ->restore();

            return redirect('/tapel/terhapus')->with('success', 'Tahun Akademik berhasil di-restore.');
        }
    }

    // public function restore($id = null)
    // {
    //     if ($id != null) {
    //          $tapel = \App\Models\Tapel::onlyTrashed()
    //          ->where('id', $id)
    //          ->restore();
    //     }
    //     else{
    //         $tapel = \App\Models\Tapel::onlyTrashed()
    //             ->restore();
    //     }
    //     return redirect('/tapel/terhapus')->with('success', 'Tahun Akademik berhasil di-restore.');
    // }
    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {

            $tapel = \App\Models\tapel::find($id);
            $tapel->delete($tapel);
            return redirect('/tapel')->with('success', 'Tahun Akademik berhasil di hapus');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin') {

            $validatedData = $request->validate([
                'tapel_awal' => 'required|string|max:255',
                'tapel_akhir' => 'required|string|max:255',
                'semester' => 'required|string|max:255',
            ]);

            $tapel = $request->tapel_awal . '/' . $request->tapel_akhir;

            // cek apakah data sudah ada
            $tapelExist = Tapel::where('tapel', $tapel)->where('semester', $request->semester)->exists();

            if ($tapelExist) {
                return redirect('/tapel')->with('error', 'Tahun Akademik dan Semester sudah ada.');
            }

            $data = Tapel::find($id);
            if (!$data) {
                return redirect('/tapel')->with('error', 'Tahun Akademik tidak ditemukan.');
            }

            $data->tapel = $tapel;
            $data->semester = $request->semester;

            // simpan perubahan ke database
            $data->save();
            return redirect('/tapel')->with('success', 'Tahun Akademik berhasil diperbarui.');
        }
    }
    public function edit($id)
    {
        $tapel = Tapel::findOrFail($id);
        return view('tapel.edit', ['tapel' => $tapel]);
    }

    public function detail($id)
    {
        $tapel = Tapel::findOrFail($id);
        return view('tapel.detail', ['tapel' => $tapel]);
    }
}
