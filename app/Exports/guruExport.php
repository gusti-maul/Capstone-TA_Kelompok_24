<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use app\Models\Guru;

class guruExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $ar_guru = DB::table('guru')->select('nip', 'nama', 'alamat', 'tgl_lahir', 'gender', 'tempat_lahir', 'no_telp', 'email', 'agama', 'foto')->get();
        return $ar_guru;
    }

    public function headings(): array
    {
        // Bagian Header Excell
        return [
            'nip', 'nama', 'alamat', 'tgl_lahir', 'gender', 'tempat_lahir', 'no_telp', 'email', 'agama', 'foto'
        ];
    }
}
