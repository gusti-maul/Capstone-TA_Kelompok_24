<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\User;
// use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // seeder tabel user
        User::create([
            'name'=> 'Syahrul Ramadhan',
            'username'=>'syahrulrama17',
            'email'=>'syahrulrama17@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Admin'
        ]);
        User::create([
            'name'=> 'Siswa',
            'username'=>'siswa',
            'email'=>'siswa@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Siswa'
        ]);
        User::create([
            'name'=> 'Gusti Maulana',
            'username'=>'gusti123',
            'email'=>'gusti@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Admin'
        ]);
        User::create([
            'name'=> 'Fiki Rilo Pambudi',
            'username'=>'fiki123',
            'email'=>'fiki@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Admin'
        ]);
        User::create([
            'name'=> 'Guruuuuuu',
            'username'=>'guru',
            'email'=>'guru@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Guru'
        ]);
        User::create([
            'name'=> 'Kepala Sekolah',
            'username'=>'kepsek',
            'email'=>'kepsek@gmail.com',
            'password'=> bcrypt('12345678'),
            'role'=> 'Kepala Sekolah'
        ]);

        // seeder tabel mapel
        Mapel::create([
            'kode_mapel'=> 'P12',
            'mapel'=>'Pendidikan Agama',
        ]);
        Mapel::create([
            'kode_mapel'=> 'M12',
            'mapel'=>'Matematika Wajib',
        ]);

        //seeder tabel siswa
        $date = Carbon::parse('2022-05-20');
        DB::table('Siswa')->insert([
            'nama_lengkap' => 'Syahrul Ramadhan',
            'jenis_kelamin' => 'Laki-Laki',
            'tanggal_lahir' => $date,
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
