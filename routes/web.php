<?php

use App\Models\KepalaSekolah;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TapelController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\JadwalUjianController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardUserAdminController;
use App\Http\Controllers\KenaikanKelasController;
use App\Http\Controllers\SiswaStatusController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/ex', function () {
//     return view('pdf/export-pdf');
// });



// ------------- Routing LandingPage ------------

Route::get('/', [HomepageController::class, 'home'])->name('home');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/portofolio', [HomepageController::class, 'portofolio'])->name('portofolio');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::get('/prestasi', [HomepageController::class, 'prestasi'])->name('prestasi');
Route::get('/siswabaru', [HomepageController::class, 'siswabaru'])->name('siswabaru');

Route::post('/siswa/import', [ImportController::class, 'importsiswa'])->name('siswa.import');




// route dashboard

Auth::routes();

//Siswa Routes List
Route::middleware(['auth', 'user-access:Siswa'])->group(function () {
    Route::get('siswa/dashboard', [HomeController::class, 'index'])->name('siswa.dashboard');
    Route::get('/siswa/profile', [SiswaController::class, 'myprofile']);
    Route::get('/{id}/editsiswa', [SiswaController::class, 'siswaedit']);
    Route::post('/{id}/updatesiswa', [SiswaController::class, 'siswaupdate']);
    Route::get('/nilai', [SiswaController::class, 'transkrip']);



    //route untuk pengajuan dokumen
    Route::get('/home', [PengajuanController::class, 'index'])->name('pengajuan.home')->middleware('auth');
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create')->middleware('auth');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store')->middleware('auth');;
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy')->middleware('auth');
    Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}', [PengajuanController::class, 'update']);
    Route::get('/pengajuan/{id}', [PengajuanController::class, 'show'])->name('pengajuan.show');
    Route::get('/pengajuan/{id}/download', [PengajuanController::class, 'download'])->name('pengajuan.download');

    //route untuk permintaan dokumen
    Route::get('/permintaan/home', [PermintaanController::class, 'index'])->name('permintaan.home')->middleware('auth');
    Route::get('/permintaan/create', [PermintaanController::class, 'create'])->name('permintaan.create');
    Route::post('/permintaan', [PermintaanController::class, 'edit'])->name('permintaan.edit');
    Route::get('/permintaan/{id}/download/', [PermintaanController::class, 'download'])->name('permintaan.download');
});

Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    // kenaikan kelas
    Route::get('/kenaikan-kelas', [KenaikanKelasController::class, 'index']);
    Route::get('/search_kenaikankelas', [KenaikanKelasController::class, 'kenaikankelas'])->name('search_kenaikankelas');
    Route::get('/kenaikankelas/{id}', [KenaikanKelasController::class, 'detail']);
    Route::get('/kelas/daftarkelas', [KenaikanKelasController::class, 'kelas']);
    Route::post('/proses-kenaikan-kelas', [KenaikanKelasController::class, 'prosesKenaikanKelas'])->name('proses_kenaikan_kelas');
});

Route::group(['middleware' => ['auth', 'user-access:Kepala Sekolah,Admin,Guru']], function () {
    // export pdf
    Route::get('export/{id}/pdf', [PdfController::class, 'pdf']);
    Route::get('/{id}/nilaipdf', [PdfController::class, 'tespdf']);


    Route::get('/jadwalujian', [JadwalUjianController::class, 'index']);
    Route::get('/jadwalujian/tambah', [JadwalUjianController::class, 'create']);
    Route::post('/jadwalujian/tambah', [JadwalUjianController::class, 'store']);
    Route::get('/jadwalujian/{id}/delete', [JadwalUjianController::class, 'delete']);
    Route::get('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'edit']);
    Route::post('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'update']);
    Route::get('/jadwalujian/{id}/detail', [JadwalUjianController::class, 'show']);

    Route::get('/jadwalujian', [JadwalUjianController::class, 'index']);
    Route::get('/jadwalujian/tambah', [JadwalUjianController::class, 'create']);
    Route::post('/jadwalujian/tambah', [JadwalUjianController::class, 'store']);
    Route::get('/jadwalujian/{id}/delete', [JadwalUjianController::class, 'delete']);
    Route::get('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'edit']);
    Route::post('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'update']);
    Route::get('/jadwalujian/{id}/detail', [JadwalUjianController::class, 'show']);

    // Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    Route::get('user/register', [DashboardUserAdminController::class, 'create']);
    Route::post('/register', [DashboardUserAdminController::class, 'registerF']);
    Route::get('/admin', [DashboardUserAdminController::class, 'admin']);
    Route::get('/user', [DashboardUserAdminController::class, 'daftar']);
    Route::get('/user/{id}/edit', [DashboardUserAdminController::class, 'edit']);
    Route::post('/user/{id}/update', [DashboardUserAdminController::class, 'update']);
    Route::get('/user/{id}/delete', [DashboardUserAdminController::class, 'delete']);

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/terhapus', [SiswaController::class, 'softdeleted']);
    Route::get('/siswa/{id}/restore', [SiswaController::class, 'restore']);
    Route::get('/siswa/register', [SiswaController::class, 'register']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);
    Route::get('/siswa/{id}/nilai', [SiswaController::class, 'nilai']);
    Route::post('/siswa/{id}/addnilai', [SiswaController::class, 'addnilai']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/{idmapel}/deletenilai', [SiswaController::class, 'deletenilai']);

    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/guru/register', [GuruController::class, 'register']);
    Route::post('/guru/create', [GuruController::class, 'create']);
    Route::get('/guru/{id}/delete', [GuruController::class, 'delete']);
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit']);
    Route::post('/guru/{id}/update', [GuruController::class, 'update']);
    Route::get('/guru/{id}/profile', [GuruController::class, 'profile']);
    Route::get('/guru/terhapus', [GuruController::class, 'softdeleted']);
    Route::get('/guru/{id}/restore', [GuruController::class, 'restore']);

    Route::get('/admin/terhapus', [DashboardUserAdminController::class, 'softdeleted']);
    Route::get('/user/{id}/restore', [DashboardUserAdminController::class, 'restore']);
    Route::get('/admin/{id}/delete', [DashboardUserAdminController::class, 'hapuspermanen']);

    Route::get('/kepalasekolah', [KepalaSekolahController::class, 'index']);
    Route::get('/kepalasekolah/register', [KepalaSekolahController::class, 'register']);
    Route::post('/kepalasekolah/create', [KepalaSekolahController::class, 'create']);
    Route::get('/kepalasekolah/{id}/delete', [KepalaSekolahController::class, 'delete']);
    Route::get('/kepalasekolah/{id}/edit', [KepalaSekolahController::class, 'edit']);
    Route::post('/kepalasekolah/{id}/update', [KepalaSekolahController::class, 'update']);
    Route::get('/kepalasekolah/{id}/profile', [KepalaSekolahController::class, 'profile']);
    Route::get('/kepalasekolah/terhapus', [KepalaSekolahController::class, 'softdeleted']);
    Route::get('/kepalasekolah/{id}/restore', [KepalaSekolahController::class, 'restore']);


    Route::get('/kelas/register', [KelasController::class, 'create']);
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
    Route::post('/kelas/{id}/update', [KelasController::class, 'update']);
    Route::get('/kelas/{id}/delete', [KelasController::class, 'delete']);


    Route::get('/mapel', [MapelController::class, 'index']);
    Route::get('/mapel/terhapus', [MapelController::class, 'softdeleted']);
    Route::Post('/mapel', [MapelController::class, 'store']);
    Route::get('/mapel/{id}/delete', [MapelController::class, 'delete']);
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit']);
    Route::post('/mapel/{id}/update', [MapelController::class, 'update']);
    Route::get('/mapel/{id}/detail', [MapelController::class, 'detail']);
    Route::get('/mapel/{id}/restore', [MapelController::class, 'restore']);



    Route::get('/tapel', [TapelController::class, 'index']);
    Route::get('/tapel/terhapus', [TapelController::class, 'softdeleted']);
    Route::Post('/tapel', [TapelController::class, 'store']);
    Route::get('/tapel/{id}/delete', [TapelController::class, 'delete']);
    Route::get('/tapel/{id}/restore', [TapelController::class, 'restore']);
    Route::get('/tapel/{id}/edit', [TapelController::class, 'edit']);
    Route::get('/tapel/{id}/detail', [TapelController::class, 'detail']);
    Route::Post('/tapel/{id}/update', [TapelController::class, 'update']);


    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('dokumen.admin');
    Route::get('/pengajuan/{id}/detail', [PengajuanController::class, 'detail'])->name('pengajuan.detail');
    Route::get('/pengajuan/{id}/downloadadmin', [PengajuanController::class, 'downloadadmin'])->name('pengajuan.downloadadmin');
    Route::put('/pengajuan/{id}/setuju', [PengajuanController::class, 'setuju'])->name('pengajuan.setuju');
    Route::put('/pengajuan/{id}/tolak', [PengajuanController::class, 'tolak'])->name('pengajuan.tolak');

    Route::get('/permintaan/{id}', [PermintaanController::class, 'show'])->name('permintaan.show');
    Route::put('/permintaan/{id}/tolak', [PermintaanController::class, 'tolak'])->name('permintaan.tolak');
    Route::put('/permintaan/{id}/setuju', [PermintaanController::class, 'setuju'])->name('permintaan.setuju');

    // import excel
    Route::post('/nilai/import', [ImportController::class, 'import']);
});


Route::group(['middleware' => ['auth', 'user-access:Siswa,Admin,Kepala Sekolah']], function () {
    Route::get('/permintaan', [PermintaanController::class, 'index'])->name('permintaan');
});


//Kepala sekolah Routes List
Route::middleware(['auth', 'user-access:Kepala Sekolah'])->group(function () {
    Route::get('/kepalasekolah/profile', [KepalaSekolahController::class, 'myprofile']);
    Route::get('/{id}/editkepalasekolah', [KepalaSekolahController::class, 'kepsekedit']);
    Route::post('/{id}/updatekepalasekolah', [KepalaSekolahController::class, 'kepsekupdate']);
});
//Guru Routes List
Route::middleware(['auth', 'user-access:Guru'])->group(function () {
    Route::get('/guru/profile', [GuruController::class, 'myprofile']);
    Route::get('/{id}/editguru', [GuruController::class, 'guruedit']);
    Route::post('/{id}/updateguru', [GuruController::class, 'guruupdate']);
});

Route::group(['middleware' => ['auth', 'user-access:Admin,Kepala Sekolah']], function () {
    Route::get('/kelulusan-siswa/{id}', [SiswaStatusController::class, 'kelulusan']);
    Route::get('/status-lainnya/{id}', [SiswaStatusController::class, 'ubahstatus']);
    Route::get('/search_tahunajaran', [SiswaStatusController::class, 'tahunajaran'])->name('search_tahunajaran');
    Route::get('/siswa/daftarkelas', [SiswaStatusController::class, 'kelas']);
    Route::post('/proses-kelulusan', [SiswaStatusController::class, 'proseskelulusan'])->name('proses-kelulusan');
    Route::post('/proses-statussiswa', [SiswaStatusController::class, 'prosesStatusSiswa'])->name('proses-statussiswa');
});


// semua bisa
Route::group(['middleware' => ['auth', 'user-access:Siswa,Admin,Guru,Kepala Sekolah']], function () {
    Route::post('/changepassword', [ChangePasswordController::class, 'changePassword']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/search_tapel/{id}', [SiswaController::class, 'searchTapel'])->name('search_tapel');
    Route::get('/transkrip/{id}', [SiswaController::class, 'transkriptapel'])->name('transkrip');

    Route::get('/siswa/{id}/export-pdf', [PdfController::class, 'pdf']);
    Route::get('/kelas/kelasx', [KelasController::class, 'kelasx']);
    Route::get('/kelas/kelasxi', [KelasController::class, 'kelasxi']);
    Route::get('/kelas/kelasxii', [KelasController::class, 'kelasxii']);
    Route::get('/kelas/all', [KelasController::class, 'index']);
    Route::get('/kelas/terhapus', [KelasController::class, 'softdeleted']);
    Route::get('/kelas/{id}/restore', [KelasController::class, 'restore']);
    Route::get('/kelas', [KelasController::class, 'kelas']);
    Route::get('/kelas/{id}/detail', [KelasController::class, 'detail']);


    Route::get('/search_kelasx', [KelasController::class, 'searchKelasX'])->name('search_kelasx');
    Route::get('/search_kelasxi', [KelasController::class, 'searchKelasXI'])->name('search_kelasxi');
    Route::get('/search_kelasxii', [KelasController::class, 'searchKelasXII'])->name('search_kelasxii');
    Route::get('/search_kelas', [KelasController::class, 'searchKelas'])->name('search_kelas');
    Route::get('/search_mapel', [MapelController::class, 'searchMapel'])->name('search_mapel');

    Route::get('/jadwalkelasx', [jadwalController::class, 'kelasx']);
    Route::get('/jadwalkelasxi', [jadwalController::class, 'kelasxi']);
    Route::get('/jadwalkelasxii', [jadwalController::class, 'kelasxii']);
    Route::get('/jadwal/tambah', [jadwalController::class, 'create']);
    Route::get('/jadwalguru', [jadwalController::class, 'index']);
    Route::post('/jadwal/tambah', [jadwalController::class, 'store']);
    Route::get('/jadwal/{id}/delete', [jadwalController::class, 'delete']);
    Route::get('/jadwal/{id}/edit', [jadwalController::class, 'edit']);
    Route::post('/jadwal/{id}/edit', [jadwalController::class, 'update']);
    Route::get('/jadwal/{id}/detail', [jadwalController::class, 'show']);

    Route::get('/jadwalpelajaran', function () {
        return view('siswa.pilihankelas');
    });

    Route::get('/jadwalujian', [JadwalUjianController::class, 'index']);
    Route::get('/jadwalujian/tambah', [JadwalUjianController::class, 'create']);
    Route::post('/jadwalujian/tambah', [JadwalUjianController::class, 'store']);
    Route::get('/jadwalujian/{id}/delete', [JadwalUjianController::class, 'delete']);
    Route::get('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'edit']);
    Route::post('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'update']);
    Route::get('/jadwalujian/{id}/detail', [JadwalUjianController::class, 'show']);

    Route::get('/jadwalujian', [JadwalUjianController::class, 'index']);
    Route::get('/jadwalujian/tambah', [JadwalUjianController::class, 'create']);
    Route::post('/jadwalujian/tambah', [JadwalUjianController::class, 'store']);
    Route::get('/jadwalujian/{id}/delete', [JadwalUjianController::class, 'delete']);
    Route::get('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'edit']);
    Route::post('/jadwalujian/{id}/edit', [JadwalUjianController::class, 'update']);
    Route::get('/jadwalujian/{id}/detail', [JadwalUjianController::class, 'show']);
});
