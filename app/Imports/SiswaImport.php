<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek apakah email valid
        $email = $row['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Email tidak valid, lewati pemrosesan data ini
            return null;
        }

        // Cek apakah email sudah digunakan sebelumnya
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            // Email sudah digunakan, lewati pemrosesan data ini
            return null;
        }

        // Cek apakah jenis kelamin valid
        $jenisKelamin = strtolower($row['jenis_kelamin']);
        $validJenisKelamin = ['laki-laki', 'perempuan'];
        if (!in_array($jenisKelamin, $validJenisKelamin)) {
            // Jenis kelamin tidak valid, lewati pemrosesan data ini
            return null;
        }

        // Cek apakah agama valid
        $agama = strtolower($row['agama']);
        $validAgama = ['islam', 'kristen', 'katolik', 'hindu', 'budha'];
        if (!in_array($agama, $validAgama)) {
            // Agama tidak valid, lewati pemrosesan data ini
            return null;
        }

        // Buat pengguna siswa baru
        $user = new User;
        $user->role = 'Siswa';
        $user->name = $row['nama_lengkap'];
        $user->username = $row['username'];
        $user->email = $email;
        $user->password = bcrypt('12345678');
        $user->save();

        // Buat data siswa baru
        $siswa = new Siswa;
        $siswa->user_id = $user->id;
        $siswa->status_siswa = 'Aktif';
        $siswa->nama_lengkap = $user->name; // Menggunakan atribut "name" dari objek user
        $siswa->jenis_kelamin = $jenisKelamin;
        $siswa->agama = $agama;
        $kelasId = request('kelas');
        $siswa->kelas_id = $kelasId;
        // Tambahkan atribut lainnya sesuai kebutuhan

        $siswa->save();

        return $siswa;
    }
}
