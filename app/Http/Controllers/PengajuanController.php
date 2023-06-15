<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Kepala Sekolah') {
            $pengajuan = Pengajuan::where('status', '!=', 'Selesai')->get();
            return view('dokumen.admin', compact('pengajuan'));
        } else if (Auth::user()->role === 'Siswa') {
            $pengajuan = Pengajuan::where('user_id', Auth::user()->id)->get();
            return view('dokumen.home', compact('pengajuan'));
        }
    }

    public function create()
    {
        return view('dokumen.pengajuan');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'alasan' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        $validatedData['user_id'] = $user->id;
        $validatedData['status'] = 'Menunggu Konfirmasi';

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $validatedData['file'] = $fileName;
        $file->storeAs('public', $fileName);

        Pengajuan::create($validatedData);

        return redirect('/home')->with('success', 'Pengajuan Legalisir berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('dokumen.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'alasan' => 'required'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->nama_siswa = $validatedData['nama_siswa'];
        $pengajuan->kelas = $validatedData['kelas'];
        $pengajuan->alasan = $validatedData['alasan'];
        $pengajuan->save();

        return redirect('/home')->with('success', 'Pengajuan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect('/home')->with('success', 'Pengajuan berhasil dihapus');
    }

    //show detail untuk siswa
    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('dokumen.detail', compact('pengajuan'));
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return response()->download(storage_path('app/public/' . $pengajuan->file));
    }

    //show detail untuk admin
    public function detail($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('dokumen.detailadmin', compact('pengajuan'));
    }

    public function downloadadmin($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return response()->download(storage_path('app/public/' . $pengajuan->file));
    }

    public function setuju($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Disetujui, Harap ambil hasil legalisir di sekolah';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan telah disetujui.');
    }

    public function tolak($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Ditolak';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
    }
}
