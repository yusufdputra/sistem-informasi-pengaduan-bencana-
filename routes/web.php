<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'auth'])->name('/');

Route::get('/home', [HomeController::class, 'auth'])->name('home');

Auth::routes();
// admin
Route::get('pengaduan/tambah', [PengaduanController::class, 'tambah'])->name('pengaduan.tambah');
Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::post('pengaduan/update', [PengaduanController::class, 'update'])->name('pengaduan.update');
Route::get('pengaduan/hapus/{id}', [PengaduanController::class, 'hapus'])->name('pengaduan/hapus');
Route::post('tracking', [PengaduanController::class, 'tracking'])->name('tracking');

Route::get('getDataWarga/{nik}', [WargaController::class, 'getDataWarga'])->name('getDataWarga');


Route::group(['middleware' => ['role:admin|superadmin']], function () {
    
    // kelola pengaduan
    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'detail'])->name('pengaduan/detail');
    Route::post('pengaduan/updateStatus', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::post('pengaduan.rekap', [ArsipController::class, 'rekap'])->name('pengaduan.rekap');
    
    // kelola arsip
    Route::get('arsip', [ArsipController::class, 'index'])->name('arsip.index');
    
    // kelola cetak
    Route::get('pengaduan/cetak/{id}', [CetakController::class, 'cetak'])->name('pengaduan/cetak');
    
    // kelola profil
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
    //kelola kata sandi
    Route::post('/katasandi.reset', [ResetPasswordController::class, 'reset'])->name('katasandi.reset');
    
    
    
});



Route::group(['middleware' => ['role:superadmin']], function () {
    // kelola akun
    Route::get('users', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/user/store', [UserManagementController::class, 'store'])->name('user.store');
    Route::post('/user/hapus', [UserManagementController::class, 'hapus'])->name('user.hapus');
    Route::post('/user/resetpw', [UserManagementController::class, 'resetpw'])->name('user.resetpw');
});
