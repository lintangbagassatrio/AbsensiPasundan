<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjadwalanController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Guru Route -----------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->group(function () {
    Route::get('admin/guru', [GuruController::class, 'index'])->name('guru');
    Route::post('admin/guru/submit', [GuruController::class, 'submit'])->name('guru.submit');
    Route::get('admin/ajaxadmin/dataGuru/{id}', [GuruController::class, 'getDataGuru']);
    Route::patch('admin/guru/ubah', [GuruController::class, 'ubah'])->name('guru.ubah');
    Route::post('admin/guru/delete/{id}', [GuruController::class,'hapus'])->name('guru.hapus');
});

// Siswa Route -----------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->group(function () {
    Route::get('admin/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::post('admin/siswa/submit', [SiswaController::class, 'submit'])->name('siswa.submit');
    Route::get('admin/ajaxadmin/dataSiswa/{id}', [SiswaController::class, 'getDataSiswa']);
    Route::patch('admin/siswa/ubah', [SiswaController::class, 'ubah'])->name('siswa.ubah');
    Route::post('admin/siswa/delete/{id}', [SiswaController::class,'hapus'])->name('siswa.hapus');
});

// Penjadwalan Route -----------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->group(function () {
    Route::get('admin/penjadwalan', [PenjadwalanController::class, 'index'])->name('penjadwalan');
    Route::post('admin/penjadwalan/submit', [PenjadwalanController::class, 'submit'])->name('penjadwalan.submit');
    Route::get('admin/ajaxadmin/dataPenjadwalan/{id}', [PenjadwalanController::class, 'getDataPenjadwalan']);
    Route::patch('admin/penjadwalan/ubah', [PenjadwalanController::class, 'ubah'])->name('penjadwalan.ubah');
    Route::post('admin/penjadwalan/delete/{id}', [PenjadwalanController::class,'hapus'])->name('penjadwalan.hapus');
});

// Absensi Route -----------------------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('guru/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('guru/absensi/absen/{id}', [AbsensiController::class, 'absen'])->name('absen');
    Route::post('guru/absensi/absen', [AbsensiController::class, 'submit'])->name('absensi.submit');
});

// Laporan Admin Route -----------------------------------------------------------------------------------------------------
Route::middleware('is_admin')->group(function () {
    Route::get('admin/laporan', [LaporanController::class, 'admin'])->name('laporan.admin');
});

// Laporan Guru Route -----------------------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('guru/laporan', [LaporanController::class, 'guru'])->name('laporan.guru');
    Route::patch('guru/laporan/ubah', [LaporanController::class, 'ubah'])->name('laporan.guru.ubah');
    Route::get('guru/ajaxadmin/dataLaporan/{id}', [LaporanController::class, 'getDataLaporan']);
});