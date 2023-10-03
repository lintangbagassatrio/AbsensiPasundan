<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;

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