<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SiswaController;
use App\Http\Controllers\backend\HadirController;
use App\Http\Controllers\backend\PegawaiController;
use App\Http\Controllers\backend\PresensiController;
use App\Http\Controllers\ArsipController;

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

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
Route::get('/edit_arsip/{id}', [ArsipController::class, 'edit'])->name('edit_arsip');
Route::patch('/arsip/{id}', [ArsipController::class, 'update']);
Route::get('/about', [ArsipController::class, 'about'])->name('about');
Route::get('/lihat_arsip/{id}', [ArsipController::class, 'show'])->name('lihat_arsip');
Route::get('/arsip_unduh/{id}', [ArsipController::class, 'unduh'])->name('arsip_unduh');
Route::get('/buat_arsip', [ArsipController::class, 'add_arsip'])->name('buat_arsip');
Route::post('/arsip', [ArsipController::class, 'create'])->name('arsip');
Route::delete('/arsip/{id}', [ArsipController::class, 'destroy']);





//Siswa
Route::get('/Siswa', [SiswaController::class, 'index'])->name('siswa');
Route::post('/Siswa/Scan', [SiswaController::class, 'scanResult'])->name('scan.result');
Route::get('Siswa/Detail/{id}', [SiswaController::class, 'detailSiswa'])->name('detail.siswa');
//Hadir
Route::get('/Hadir-Siswa', [HadirController::class, 'index'])->name('hadir');
Route::get('/Hadir-Siswa/Scan', [HadirController::class, 'scanqrcode'])->name('qr.hadir');
Route::post('/Hadir-Siswa/Absensi-Action', [HadirController::class, 'insert'])->name('in.hadir');

//PEGAWAI
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/pegawai/scan', [PegawaiController::class, 'scanResult'])->name('scan.result');
Route::get('pegawai/detail/{id}', [PegawaiController::class, 'detailPegawai'])->name('detail.pegawai');
//PRESENSI
Route::get('/presensi-pegawai', [PresensiController::class, 'index'])->name('presensi');
Route::get('/presensi-pegawai/Scan', [PresensiController::class, 'scanqrcode'])->name('qr.presensi');
Route::post('/presensi-pegawai/Absensi-Action', [PresensiController::class, 'insert'])->name('in.presensi');
