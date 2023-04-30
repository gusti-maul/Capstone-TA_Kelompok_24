<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
      
    }
}
