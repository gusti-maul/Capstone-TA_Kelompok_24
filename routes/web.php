<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardUserAdminController;
use App\Http\Controllers\SiswaController;

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
 

 
Route::get('/', function () {
    return view('welcome');
});



 
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

});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:Guru'])->group(function () {
    Route::get('guru/dashboard', [HomeController::class, 'guruHome'])->name('guru.dashboard');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:Kepala Sekolah'])->group(function () {
    Route::get('kepalasekolah/dashboard', [HomeController::class, 'kepsekHome'])->name('kepsek.dashboard');
});

