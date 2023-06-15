<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PdfController extends Controller
{

    public function pdf($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $pdf = Pdf::loadView('pdf.export-pdf', ['siswa' => $siswa]);
        return $pdf->download('transkrip.pdf');
    }

    public function tespdf($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view("pdf.export-pdf", ['siswa' => $siswa]);
    }
}
