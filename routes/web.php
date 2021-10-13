<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LookBookController;
use App\Http\Controllers\MahasiswaBimbingan;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserManagementController;
use App\Models\Lookbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('/');


Route::post('/register/mahasiswa', [RegisterController::class, 'mahasiswa'])->name('register.mahasiswa');
Route::post('/register/dosen', [RegisterController::class, 'dosen'])->name('register.dosen');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
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
    Route::get('/GetDosenRekomendasi/{id}', [PengajuanMagangController::class, 'getDosenRekomendasi'])->name('GetDosenRekomendasi');
    Route::get('/GetJumlahBimbingan/{id}', [PengajuanMagangController::class, 'getJumlahBimbingan'])->name('GetJumlahBimbingan');

    // kelola sekolah
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::post('/sekolah/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::POST('/sekolah/hapus/', [SekolahController::class, 'hapus'])->name('sekolah.hapus');
});

Route::group(['middleware' => ['role:mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/tambah', [PengajuanMagangController::class, 'tambah'])->name('pengajuanMagang.tambah');
    Route::post('pengajuan-magang/store', [PengajuanMagangController::class, 'store'])->name('pengajuanMagang.store');
    Route::post('pengajuan-magang/upload', [PengajuanMagangController::class, 'uploadLaporan'])->name('pengajuanMagang.upload');
    Route::get('/pengajuan-magang/edit/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang/edit');
    // Route::POST('/pengajuan-magang/hapus/', [PengajuanMagangController::class, 'hapus'])->name('pengajuanMagang.hapus');

    // kuisioner
    Route::post('isi-kuisioner/store', [KuisionerController::class, 'store'])->name('kuisioner.store');

    //kelola lookbook
    Route::get('/lookbook/{id}', [LookBookController::class, 'index'])->name('lookbook');
    Route::post('lookbook/store', [LookBookController::class, 'store'])->name('lookbook.store');
    Route::POST('/lookbook/hapus/', [LookBookController::class, 'hapus'])->name('lookbook.hapus');

});

Route::group(['middleware' => ['role:admin|mahasiswa']], function () {

    // kelola pengajuan magang
    Route::get('pengajuan-magang/', [PengajuanMagangController::class, 'index'])->name('pengajuanMagang.index');
    
    // kuisioner
    Route::get('isi-kuisioner/{id}', [KuisionerController::class, 'index'])->name('kuisioner');
});

Route::group(['middleware' => ['role:dosen|admin']], function () {
    // riwayat magang
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});

Route::group(['middleware' => ['role:dosen']], function () {

    // kelola mhs magang
    Route::get('mahasiswa-bimbingan/', [MahasiswaBimbingan::class, 'index'])->name('mahasiswa.index');

    Route::post('pengajuan-magang/nilai', [MahasiswaBimbingan::class, 'inputNilai'])->name('pengajuanMagang.nilai');

    //kelola lookbook
    Route::get('/lookbookMhs/{id}', [LookBookController::class, 'index'])->name('lookbookMhs');
});

