<?php

namespace App\Http\Controllers;

use App\Imports\NilaiImport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Guru') {
            $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            try {
                Excel::import(new NilaiImport, $request->file('excel_file'));
                return back()->with('success', 'Nilai siswa berhasil ditambahkan!');
            } catch (\Throwable $th) {
                // Tangani kesalahan impor
                return back()->with('error', 'Terjadi kesalahan dalam mengimpor data siswa. Pastikan format file Excel benar.')->withInput();
            }
        }
    }

    public function importsiswa(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            try {
                Excel::import(new SiswaImport, $request->file('excel_file'));
                return back()->with('success', 'Siswa berhasil ditambahkan!');
            } catch (\Throwable $th) {
                // Tangani kesalahan impor
                return back()->with('error', 'Terjadi kesalahan dalam mengimpor data siswa. Pastikan format file Excel benar.')->withInput();
            }
        }
    }
}
