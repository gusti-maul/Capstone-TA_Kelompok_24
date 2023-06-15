<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use App\Models\DaftarUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = \App\Models\Kelas::all();
        $siswa = \App\Models\Siswa::all();
        return view("siswa.siswa", ['siswa' => $siswa, 'kelas' => $kelas]);
    }
    public function softdeleted()
    {
        $siswa = \App\Models\Siswa::onlyTrashed()->get();
        return view("siswa.softdeleted", ['siswa' => $siswa]);
    }

    public function register()
    {
        if (Auth::user()->role === 'Admin') {

            return view("siswa.register");
        }
    }
    public function create(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // Validasi data input
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
            ]);

            // Insert user
            $user = new \App\Models\User;
            $user->role = 'Siswa';
            $user->name = $validatedData['nama_lengkap'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt('12345678');
            $user->save();

            // Insert siswa
            $request->request->add(['user_id' => $user->id]);
            $request->request->add(['status_siswa' => 'Aktif']); // Set status siswa sebagai "Aktif"
            $siswa = \App\Models\Siswa::create($request->all());

            return redirect('/siswa')->with('success', 'Siswa has been added!');
        }
    }
    public function edit($id)
    {
        if (Auth::user()->role === 'Admin') {

            $kelas = Kelas::all();
            $users = User::all();
            $siswa = \App\Models\Siswa::find($id);
            return view('/siswa/edit', compact('kelas', 'users', 'siswa'));
        }
    }

    public function siswaedit($id)
    {
        if (Auth::user()->role === 'Siswa') {

            $kelas = Kelas::all();
            $users = User::all();
            $siswa = \App\Models\Siswa::find($id);
            return view('/siswa/siswaedit', compact('kelas', 'users', 'siswa'));
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Siswa') {

            $siswa = \App\Models\Siswa::find($id);
            $siswa->update($request->all());
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                $siswa->save();
            }
            return redirect('/siswa/' . $id . '/profile')->with('success', 'Data Siswa Berhasil Diperbarui');
        }
    }
    public function siswaupdate(Request $request, $id)
    {
        if (Auth::user()->role === 'Siswa') {

            $siswa = \App\Models\Siswa::find($id);
            $siswa->update($request->all());
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                $siswa->save();
            }
            return redirect('/siswa/profile')->with('success', 'Data Siswa Berhasil Diperbarui');
        }
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view("siswa.profile", ['siswa' => $siswa]);
    }

    public function myprofile()
    {
        $siswa = Siswa::all();
        return view("siswa.myprofile", ['siswa' => $siswa]);
    }

    public function nilai($id)
    {
        if ($id === null) {
            return redirect('/siswa');
        }

        $tapel = Tapel::all();
        $siswa = \App\Models\Siswa::find($id);

        // Memeriksa jika siswa dengan ID yang diberikan tidak ditemukan
        if (!$siswa) {
            return redirect('/siswa')->with('error', 'Siswa tidak ditemukan');
        }

        $tahunAjaran = null;

        if ($siswa->kelas && $siswa->kelas->tapel) {
            $tahunAjaran = $siswa->kelas->tapel->id;
        }

        $kelas = Kelas::whereHas('tapel', function ($query) use ($tahunAjaran) {
            $query->where('id', $tahunAjaran);
        })->get();

        $matapelajaran = \App\Models\Mapel::whereHas('tapel', function ($query) use ($tahunAjaran) {
            $query->where('id', $tahunAjaran);
        })->get();

        $guru = Guru::all();
        $nilaiSiswa = $siswa->mapel;

        return view("nilai.nilai", compact('siswa', 'nilaiSiswa', 'guru', 'kelas', 'tapel', 'matapelajaran'));
    }




    public function searchTapel(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $kelas = Kelas::all();
        $tapel = Tapel::all();
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $matapelajaran = \App\Models\Mapel::whereHas('tapel', function ($query) use ($tahunAjaran) {
                $query->where('id', $tahunAjaran);
            })->get();
        } else {
            $matapelajaran = \App\Models\Mapel::all(); // Menampilkan semua mata pelajaran jika tidak ada tahun ajaran yang dipilih
        }
        $guru = Guru::all();
        // Mengambil hanya nilai siswa pada mata pelajaran yang ada pada tahun ajaran yang dipilih
        $nilaiSiswa = $siswa->mapel()->whereIn('mapel_id', $matapelajaran->pluck('id'))->get();

        return view("nilai.nilai", compact('siswa', 'nilaiSiswa', 'guru', 'kelas', 'tapel', 'matapelajaran'));
    }
    public function transkrip()
    {
        $tapel = Tapel::all();
        $siswa = Auth::user()->siswa;
        $nilaiSiswa = $siswa->mapel;

        return view('nilai.transkrip', compact('siswa', 'tapel', 'nilaiSiswa'));
    }
    public function transkriptapel(Request $request)
    {
        $tapel = Tapel::all();
        $siswa = Auth::user()->siswa;
        $tahunAjaran = $request->input('tahun_ajaran');

        if ($tahunAjaran) {
            $matapelajaran = \App\Models\Mapel::whereHas('tapel', function ($query) use ($tahunAjaran) {
                $query->where('id', $tahunAjaran);
            })->get();

            $nilaiSiswa = $siswa->mapel()->whereIn('mapel_id', $matapelajaran->pluck('id'))->get();
        } else {
            $matapelajaran = \App\Models\Mapel::all();
            $nilaiSiswa = $siswa->mapel;
        }

        return view('nilai.transkrip', compact('siswa', 'tapel', 'nilaiSiswa'));
    }

    public function restore($id)
    {
        if (Auth::user()->role === 'Admin') {
            $siswa = \App\Models\Siswa::onlyTrashed()
                ->where('id', $id)
                ->first();

            if ($siswa) {
                $user_id = $siswa->user_id;

                $siswa->restore();

                if ($user_id) {
                    $user = \App\Models\User::onlyTrashed()
                        ->where('id', $user_id)
                        ->first();

                    if ($user) {
                        $user->restore();
                    }
                }

                return redirect('/siswa/terhapus')->with('success', 'Siswa berhasil di-restore beserta data akunnya');
            } else {
                return redirect('/siswa/terhapus')->with('error', 'Siswa gagal di-restore');
            }
        }
    }


    public function delete($id)
    {
        if (Auth::user()->role === 'Admin') {
            $siswa = \App\Models\Siswa::findOrFail($id);
            $user_id = $siswa->user_id;

            if ($siswa->delete()) {
                $user = \App\Models\User::findOrFail($user_id);
                $user->delete();
                return redirect('/siswa')->with('success', 'Siswa berhasil di hapus beserta data akunnya');
            } else {
                return redirect('/siswa')->with('error', 'Siswa gagal di hapus');
            }
        }
    }




    public function addnilai(Request $request, $idsiswa)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Guru') {

            $siswa = \App\Models\Siswa::find($idsiswa);

            // Validasi data
            $validatedData = $request->validate([
                'mapel' => 'required|string',
                'nilai_pengetahuan' => 'required|string|min:0|max:100',
                'nilai_keterampilan' => 'required|string|min:0|max:100',
            ]);

            if ($siswa->mapel()->where('mapel_id', $validatedData['mapel'])->exists()) {
                return redirect('siswa/' . $idsiswa . '/nilai')->with('error', 'Mata pelajaran sudah ada');
            }

            $siswa->mapel()->attach($validatedData['mapel'], [
                'nilai_pengetahuan' => $validatedData['nilai_pengetahuan'],
                'nilai_keterampilan' => $validatedData['nilai_keterampilan']
            ]);

            return redirect('siswa/' . $idsiswa . '/nilai')->with('success', 'Nilai berhasil di input');
        }
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Guru') {

            $siswa = \App\Models\Siswa::find($idsiswa);
            $siswa->mapel()->detach($idmapel);
            return redirect()->back()->with('success', 'Nilai berhasil di hapus');
        }
    }
}
