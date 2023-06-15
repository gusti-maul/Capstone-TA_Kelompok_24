<?php

namespace App\Imports;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $kelasId = request('kelas'); // Mengambil nilai kelas_id dari elemen <select>

        foreach ($rows as $row) {
            $siswa = Siswa::where('nama_lengkap', $row['siswa'])
                ->whereHas('kelas', function ($query) use ($kelasId) {
                    $query->where('id', $kelasId);
                })
                ->first();

            if ($siswa != null) {
                $mapelId = request('mapel'); // Mengambil nilai mapel_id dari elemen <select>

                Nilai::firstOrCreate([
                    'mapel_id'     => $mapelId, // Menggunakan nilai mapel_id yang diambil dari elemen <select>
                    'siswa_id'    => $siswa->id,
                ], [
                    'nilai_pengetahuan' => $row['pengetahuan'],
                    'nilai_keterampilan' => $row['keterampilan']
                ]);
            }
        }
    }



}
