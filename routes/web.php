<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\RabTempController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserManagementController;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'auth'])->name('/');

Auth::routes();

Route::post('/register/mahasiswa', [RegisterController::class, 'mahasiswa'])->name('register.mahasiswa');
Route::post('/register/dosen', [RegisterController::class, 'dosen'])->name('register.dosen');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin

Route::group(['middleware' => ['role:admin']], function () {
    // user management
    Route::get('/user/{jenis}', [UserManagementController::class, 'index'])->name('user.index');
    Route::post('/user/hapus', [UserManagementController::class, 'hapus'])->name('user.hapus');
    Route::post('/user/resetpw', [UserManagementController::class, 'resetpw'])->name('user.resetpw');
    Route::post('/user/status', [UserManagementController::class, 'status'])->name('user.status');

    // kelola periode
    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
    Route::post('/periode/store', [PeriodeController::class, 'store'])->name('periode.store');
    Route::POST('/periode/hapus/', [PeriodeController::class, 'hapus'])->name('periode.hapus');
    Route::get('/getPeriodeById/{id}', [PeriodeController::class, 'getPeriodeById'])->name('getPeriodeById');
    
    
    // kelola prodi
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::post('/prodi/store', [ProdiController::class, 'store'])->name('prodi.store');
    Route::POST('/prodi/hapus/', [ProdiController::class, 'hapus'])->name('prodi.hapus');
    
    //kelola pengajuan magang
    Route::get('pengajuan-magang/detail/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang.detail');
    Route::post('pengajuan-magang/proses', [PengajuanMagangController::class, 'proses'])->name('pengajuanMagang.proses');
    
   
});

Route::group(['middleware' => ['role:mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/tambah', [PengajuanMagangController::class, 'tambah'])->name('pengajuanMagang.tambah');
    Route::post('pengajuan-magang/store', [PengajuanMagangController::class, 'store'])->name('pengajuanMagang.store');
    Route::get('/pengajuan-magang/edit/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang/edit');
    // Route::POST('/pengajuan-magang/hapus/', [PengajuanMagangController::class, 'hapus'])->name('pengajuanMagang.hapus');

});

Route::group(['middleware' => ['role:admin|mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/', [PengajuanMagangController::class, 'index'])->name('pengajuanMagang.index');


    // kelola cetak
    Route::post('/cetak/cetak', [CetakController::class, 'cetak'])->name('cetak.cetak');
});

Route::group(['middleware' => ['role:admin|mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/', [PengajuanMagangController::class, 'index'])->name('pengajuanMagang.index');


    // kelola cetak
    Route::post('/cetak/cetak', [CetakController::class, 'cetak'])->name('cetak.cetak');
});

Route::get('/getBarangById/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');
