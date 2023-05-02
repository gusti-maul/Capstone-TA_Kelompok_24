<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapel = \App\Models\Mapel::all();
        return view("mapel.index", ['mapel' => $mapel]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'require',
            'mapel' => 'required',
        ]);

        $mapel = new \App\Models\Mapel();
        $mapel->nama = $request->input('kode_mapel');
        $mapel->deskripsi = $request->input('mapel');
        $mapel->save();

        return redirect()->route('mapel.index')
        ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }
}
