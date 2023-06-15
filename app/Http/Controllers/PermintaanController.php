<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;
use App\Helpers\ConvertApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\TemplateProcessor;

class PermintaanController extends Controller
{

    public function index()
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Kepala Sekolah') {
            $Permintaan = Permintaan::where('status', '!=', 'Selesai')->get();
            return view('dokumen.permintaan.admin', compact('Permintaan'));
        } else if (Auth::user()->role === 'Siswa') {
            $Permintaan = Permintaan::where('user_id', Auth::user()->id)->get();
            return view('dokumen.permintaan.home', compact('Permintaan'));
        }
    }

    public function create()
    {
        return view('dokumen.permintaan.edit');
    }

    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'tempat' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'ortu' => 'required',
            'alamat' => 'required',
            'ket' => 'required'
        ]);

        // Periksa apakah file template.docx ada
        if (!file_exists('template.docx')) {
            return back()->with('error', 'File template tidak ditemukan.');
        }

        // Data yang akan diisi pada dokumen
        $nama = $request->nama;
        $nisn = $request->nisn;
        $tempat = $request->tempat;
        $ttl = date('d-m-Y', strtotime($request->ttl));
        $agama = $request->agama;
        $ortu = $request->ortu;
        $alamat = $request->alamat;
        $ket = $request->ket;

        // Buat file baru berdasarkan template.docx
        $editDoc = new TemplateProcessor(public_path('template.docx'));

        //generate nomor surat
        $nosurat = sprintf('%04d', Permintaan::count() + 1);
        $editDoc->setValue('nosurat', $nosurat);

        //generate data pada template.docx
        $editDoc->setValue('nama', $nama);
        $editDoc->setValue('nisn', $nisn);
        $editDoc->setValue('tempat', $tempat);
        $editDoc->setValue('ttl', $ttl);
        $editDoc->setValue('agama', $agama);
        $editDoc->setValue('ortu', $ortu);
        $editDoc->setValue('alamat', $alamat);
        $editDoc->setValue('ket', $ket);

        // Buat data baru Permintaan
        $Permintaan = new Permintaan;
        $Permintaan->nama = $request->nama;
        $Permintaan->nisn = $request->nisn;
        $Permintaan->tempat = $request->tempat;
        $Permintaan->ttl = date('Y-m-d', strtotime($request->ttl));
        $Permintaan->agama = $request->agama;
        $Permintaan->ortu = $request->ortu;
        $Permintaan->alamat = $request->alamat;
        $Permintaan->ket = $request->ket;
        $Permintaan->status = 'Menunggu';

        // Set user_id dengan id user yang sedang login
        $Permintaan->user_id = Auth::user()->id;

        // Simpan data Permintaan ke database
        $Permintaan->save();



        // Mendapatkan tanggal dan bulan saat ini
        $tanggal = date('d-m-Y');
        $bulan = date('F');

        // Konversi nama bulan ke romawi
        $nama_bulan = [
            'January' => 'I',
            'February' => 'II',
            'March' => 'III',
            'April' => 'IV',
            'May' => 'V',
            'June' => 'VI',
            'July' => 'VII',
            'August' => 'VIII',
            'September' => 'IX',
            'October' => 'X',
            'November' => 'XI',
            'December' => 'XII'
        ];
        $bulan = $nama_bulan[$bulan];

        // Mengganti nilai variabel di template dengan nilai yang baru
        $editDoc->setValue('tgl', $tanggal);
        $editDoc->setValue('bulan', $bulan);

        // Menyimpan file dengan nama yang unik
        $filename = 'hasilsuket-' . date('Ymd');
        $i = 0;
        while (file_exists(public_path('storage/' . $filename . ($i == 0 ? '' : $i) . '.docx'))) {
            $i++;
        }
        $filename = $filename . ($i == 0 ? '' : $i) . '.docx';
        $editDoc->saveAs(public_path('storage/' . $filename));

        // konversi file .docx ke .pdf menggunakan ConvertAPI
        $apiKey = 'GZ20icrFwpLrmTq1'; // ganti dengan API key kamu
        ConvertApiHelper::setApiSecret($apiKey);

        $inputFilePath = public_path('storage/' . $filename);
        $outputFilePath = public_path('storage/') . pathinfo($filename, PATHINFO_FILENAME) . '.pdf';

        ConvertApiHelper::convertDocxToPdf($inputFilePath, $outputFilePath);


        $Permintaan->file = pathinfo($filename, PATHINFO_FILENAME) . '.pdf';
        $Permintaan->save();



        // Kembalikan respons dengan pesan sukses
        return redirect('/permintaan/home')->with('success', 'Berhasil menyimpan data')->with('filename', $filename);
    }

    public function show($id)
    {
        $Permintaan = Permintaan::findOrFail($id);
        return view('dokumen.permintaan.detail', compact('Permintaan'));
    }

    public function setuju($id)
    {
        $Permintaan = Permintaan::findOrFail($id);
        $Permintaan->status = 'Disetujui';
        $Permintaan->save();

        return redirect()->back()->with('success', 'Pengajuan telah disetujui.');
    }

    public function tolak($id)
    {
        $Permintaan = Permintaan::findOrFail($id);
        $Permintaan->status = 'Ditolak';
        $Permintaan->save();

        return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
    }

    public function download($id)
    {
        $Permintaan = Permintaan::findOrFail($id);
        return response()->file(storage_path('app/public/' . $Permintaan->file));
    }
}
