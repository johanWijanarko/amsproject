<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuditeController;
use App\Http\Controllers\PustakaProgramController;
use App\Http\Controllers\RefrensiAuditController;


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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

// Route::get('/pegawai', function () {
//     return view('admin/pegawai');
// });
// pegawai
Route::get('/pegawai',[PegawaiController::class,'index']);
Route::get('/pegawai/cari',[PegawaiController::class,'cari'])->name('pegawai.cari');
Route::get('/pegawai/detail/{id}',[PegawaiController::class,'detail'])->name('pegawai.detail');
Route::get('/pegawai/tambah',[PegawaiController::class,'tambah_pegawai'])->name('pegawai.tambah');
Route::post('/pegawai/save',[PegawaiController::class,'save_pegawai'])->name('pegawai.save');
Route::get('/pegawai/delete/{id}',[PegawaiController::class,'deletePegawai'])->name('pegawai.delete');
Route::get('/pegawai/edit/{id}',[PegawaiController::class,'getEdit'])->name('pegawai.edit');
Route::post('/pegawai/update/{id}',[PegawaiController::class,'updatePegawai'])->name('pegawai.update');


// pendidikan
Route::post('/pegawai/save_pendidikan',[PegawaiController::class,'save_pendidikan'])->name('pegawai.save_pendidikan');
Route::get('/pegawai/delete_pendidikan/{id}',[PegawaiController::class,'delete_pendidikan'])->name('pegawai.delete_pendidikan');
Route::get('/pegawai/edit_pendidikan/{id}',[PegawaiController::class,'edit_pendidikan']);
Route::post('/pegawai/update_pendidikan/{id}',[PegawaiController::class,'update_pendidikan'])->name('pegawai.update_pendidikan');


// pelatihan
Route::post('/pegawai/save_pelatihan',[PegawaiController::class,'save_pelatihan'])->name('pegawai.save_pelatihan');
Route::get('/pegawai/delete_pelatihan/{id}',[PegawaiController::class,'delete_pelatihan'])->name('pegawai.delete_pelatihan');
Route::get('/pegawai/edit_pelatihan/{id}',[PegawaiController::class,'edit_pelatihan']);
Route::post('/pegawai/update_pelatihan/{id}',[PegawaiController::class,'update_pelatihan'])->name('pegawai.update_pelatihan');


// Manajement Audite
Route::get('/audite',[AuditeController::class,'index']);
Route::get('/audite/cari',[AuditeController::class,'cari'])->name('audite.cari');
Route::get('/audite/tambah',[AuditeController::class,'tambah_audite'])->name('audite.tambah');
Route::get('/audite/get_kota',[AuditeController::class,'city'])->name('audite.get_kota');
Route::get('/audite/detail_audite/{id}',[AuditeController::class,'detail'])->name('audite.detail_audite');
Route::get('/audite/delete_audite/{id}',[AuditeController::class,'delete_audite'])->name('audite.delete_audite');
Route::post('/audite/save_audite',[AuditeController::class,'save_audite'])->name('audite.save_audite');
Route::get('/audite/get_audite/{id}',[AuditeController::class,'get_audite'])->name('audite.get_audite');
Route::post('/audite/update_audite/{id}',[AuditeController::class,'update_audite'])->name('audite.update_audite');




// pejabat audite
Route::get('/audite/detail_pejabat/{id}',[AuditeController::class,'detail_pejabat']);
Route::get('/audite/edit_pejabat/{id}',[AuditeController::class,'edit_pejabat']);
Route::post('/audite/update_pejabat/{id}',[AuditeController::class,'update_pejabat'])->name('audite.update_pejabat');
Route::post('/audite/save_pejabat',[AuditeController::class,'save_pejabat'])->name('audite.save_pejabat');
Route::get('/audite/delete_pejabat/{id}',[AuditeController::class,'delete_pejabat'])->name('audite.delete_pejabat');


// pustaka audit
Route::get('/pustaka_prog',[PustakaProgramController::class,'index']);
Route::get('/pustaka_prog/cari',[PustakaProgramController::class,'cari'])->name('pustaka_prog.cari');
Route::get('/pustaka_prog/tambah',[PustakaProgramController::class,'tambah_pustaka_prog'])->name('pustaka_prog.tambah_pustaka_prog');
Route::get('/pustaka_prog/edit/{id}',[PustakaProgramController::class,'edit_pustaka_prog'])->name('pustaka_prog.edit_pustaka_prog');
Route::get('/pustaka_prog/detail_pustaka_prog/{id}',[PustakaProgramController::class,'detail_pustaka_prog'])->name('pustaka_audit.detail_pustaka_prog');
Route::post('/pustaka_prog/update_pustaka_prog/{id}',[PustakaProgramController::class,'update_pustaka_prog'])->name('pustaka_prog.update_pustaka_prog');
Route::post('/pustaka_prog/save_pustaka_prog',[PustakaProgramController::class,'save_pustaka_prog'])->name('pustaka_prog.save_pustaka_prog');
Route::get('/pustaka_prog/delete_pustaka_prog/{id}',[PustakaProgramController::class,'delete_pustaka_prog'])->name('pustaka_prog.delete_pustaka_prog');

// Refrensi audite
Route::get('/rfaudit',[RefrensiAuditController::class,'index']);
Route::get('/rfaudit/cari',[RefrensiAuditController::class,'cari'])->name('rfaudit.cari');
Route::get('/rfaudit/tambah',[RefrensiAuditController::class,'tambah'])->name('rfaudit.tambah');
Route::post('/rfaudit/save',[RefrensiAuditController::class,'save'])->name('rfaudit.save_refprog');
Route::get('/rfaudit/delete/{id}',[RefrensiAuditController::class,'delete'])->name('rfaudit.delete');
Route::get('/rfaudit/edit/{id}',[RefrensiAuditController::class,'edit'])->name('rfaudit.edit');
Route::post('/pustaka_prog/update_refprog/{id}',[RefrensiAuditController::class,'update_refprog'])->name('rfaudit.update_refprog');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
