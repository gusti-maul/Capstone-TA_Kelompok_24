<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilaipengetahuan(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai_pengetahuan' => $request->value]);
    }

    public function editnilaiketerampilan(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai_keterampilan' => $request->value]);
    }
}
