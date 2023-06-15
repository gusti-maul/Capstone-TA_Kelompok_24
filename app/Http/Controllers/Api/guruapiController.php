<?php

namespace App\Http\Controllers\Api;

use app\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\guruResource as ResourcesGuruResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class guruapiController extends Controller
{
    public function index()
    {
        $guru = DB::table('guru')->select('guru.*')->get();
        return new ResourcesGuruResource(true, 'Data Guru', $guru);
    }

    public function show($id)
    {
        $guru = DB::table('guru')->select('guru.*')->where('id', '=', $id)->get();
        if ($guru) {
            return response()->json(
                [
                    'success' => true,
                    'massage' => 'Detail Guru',
                    'data' => $guru,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'massage' => 'Detail Guru Tidak di Temukan',
                ],
                404
            );
        }

        return new ResourcesGuruResource(true, 'Data Detail Guru', $guru);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'agama' => 'required',
            // 'foto' => 'null',

        ]);

        //Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //Proses Simpan Data
        $guru = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'agama' => $request->agama,
            // 'foto' => $request->foto,
        ]);
        return new ResourcesGuruResource(true, 'Data Berhasi di Input', $guru);
    }
}
