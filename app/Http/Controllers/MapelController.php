<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        return view("mapel.index", ['mapel' => $mapel]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_mapel' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);
        $mapel = \App\Models\Mapel::create($validatedData);
        return redirect('/mapel')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $mapel = \App\Models\Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('success', 'Mata pelajaran berhasil di hapus');
    }
}
