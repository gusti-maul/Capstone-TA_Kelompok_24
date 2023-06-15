<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $date = Carbon::parse('2022-05-20');
        DB::table('Siswa')->insert([
            'nama_lengkap' => 'Syahrul Ramadhan',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' => $date ,
            'agama' => 'Islam',
            'nama_ayah' => 'ayah',
            'nama_ibu' => 'ibu',
            'pekerjaan_ayah' => 'ayah',
            'pekerjaan_ibu' => 'ibu',
            'nama_wali' => '',
            'pekerjaan_wali' => '',
            'alamat' => 'jambi',
          
        ]);
    }
}
