<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardUserAdminController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Models\Mapel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//routes/web.php


// route untuk tes doang
Route::get('/', function () {
    return view('welcome');
});
Route::get('/coba', function () {
    return view('coba');
});
Route::get('/ex', function () {
    return view('ex');
});





// ini route asli
Auth::routes();

//Siswa Routes List
Route::middleware(['auth', 'user-access:Siswa'])->group(function () {
    Route::get('siswa/dashboard', [HomeController::class, 'index'])->name('siswa.dashboard');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    Route::get('user/register', [DashboardUserAdminController::class, 'create']);
    Route::post('/register', [DashboardUserAdminController::class, 'store']);
    Route::get('/user', [DashboardUserAdminController::class, 'daftar']);
    Route::get('/user/{id}/edit', [DashboardUserAdminController::class, 'edit']);
    Route::post('/user/{id}/update', [DashboardUserAdminController::class, 'update']);
    Route::get('/user/{id}/delete', [DashboardUserAdminController::class, 'delete']);

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/register', [SiswaController::class, 'register']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);
    Route::get('/siswa/{id}/nilai', [SiswaController::class, 'nilai']);
    Route::post('/siswa/{id}/addnilai', [SiswaController::class, 'addnilai']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/{idmapel}/deletenilai', [SiswaController::class, 'deletenilai']);


    Route::get('/mapel', [MapelController::class, 'index']);
    Route::get('/mapel/create', [MapelController::class, 'create']);
    Route::Post('/mapel', [MapelController::class, 'store']);
    Route::get('/mapel/{id}/delete', [MapelController::class, 'delete']);
});

//Guru Routes List
Route::middleware(['auth', 'user-access:Guru'])->group(function () {
    Route::get('guru/dashboard', [HomeController::class, 'guruHome'])->name('guru.dashboard');
});

//Kepala sekolah Routes List
Route::middleware(['auth', 'user-access:Kepala Sekolah'])->group(function () {
    Route::get('kepalasekolah/dashboard', [HomeController::class, 'kepsekHome'])->name('kepsek.dashboard');
});
