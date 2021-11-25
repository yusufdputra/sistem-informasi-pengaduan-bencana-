<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\LookBookController;
use App\Http\Controllers\MahasiswaBimbingan;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengajuanMagangController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WargaController;
use App\Models\Lookbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'auth'])->name('/');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
// admin
Route::get('pengaduan/tambah', [PengaduanController::class, 'tambah'])->name('pengaduan.tambah');
Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::post('pengaduan/update', [PengaduanController::class, 'update'])->name('pengaduan.update');
Route::get('getDataWarga/{nik}', [WargaController::class, 'getDataWarga'])->name('getDataWarga');
Route::post('tracking', [PengaduanController::class, 'tracking'])->name('tracking');


Route::group(['middleware' => ['role:admin']], function () {
    
    // kelola pengajuan magang
    Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'detail'])->name('pengaduan/detail');
    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('pengaduan/updateStatus', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::get('/pengajuan-magang/edit/{id}', [PengajuanMagangController::class, 'detail'])->name('pengajuanMagang/edit');


});


