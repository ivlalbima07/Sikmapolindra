<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosentamuController;
use App\Http\Controllers\PklDosenController;
use App\Http\Controllers\PklMhsController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\RisetTerapanController;
use App\Http\Controllers\LulusanController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\JoinResearchController;
use App\Http\Controllers\pelatihanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

//auth//
Route::get('/', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('loginForm');
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('loginForm');
Route::post('/loginProses', [AuthController::class, 'login'])->middleware('guest')->name('ceklogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgotpassword', [AuthController::class, 'forgotpassword'])->middleware('guest')->name('forgotpassword');
Route::get('/resetpassword', [AdminController::class, 'resetpassword'])->middleware('guest')->name('resetpassword');

Route::middleware('auth')->group(function () {
    Route::get('/recap', [AdminController::class, 'recap'])->name('recap');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/cooperation', [AdminController::class, 'cooperation'])->name('cooperation');
    Route::get('/implementation', [AdminController::class, 'implementation'])->name('implementation');
    Route::get('/companion', [AdminController::class, 'companion'])->name('companion');
  Route::get('/operator', [UserController::class, 'operator'])->name('operator');

    //sub_companion
    Route::get('/DosenTamu', [DosentamuController::class, 'DosenTamu'])->name('DosenTamu');
    Route::get('/IsiData', [DosentamuController::class, 'IsiData'])->name('IsiData');

  Route::get('/Pkl_Dosen', [PklDosenController::class, 'PklDosen'])->name('PklDosen');
  Route::get('/IsiDataTenagaPendidik', [PklDosenController::class, 'IsiDatapkldosen'])->name('IsiDatapkldosen');


    Route::get('/Pkl_mhs', [AdminController::class, 'Pkl_mahasiswa'])->name('Pkl_mahasiswa');
    Route::get('/isipelaksanaan', [AdminController::class, 'isipelaksanaan'])->name('isipelaksanaan');
    Route::get('/lihatpelaksanaan', [PklMhsController::class, 'lihat'])->name('lihat');

    //sertiikasi
    Route::get('/sertifikasi', [SertifikasiController::class, 'Sertifikasi'])->name('Sertifikasi');

    //RisetTerapan
     Route::get('/RisetTerapan', [RisetTerapanController::class, 'RisetTerapan'])->name('RisetTerapan');

     //Penyerapan Lulusan
     Route::get('/Penyerapan', [LulusanController::class, 'PenyerapanLulusan'])->name('PenyerapanLulusan');


     //beasiswa
     Route::get('/beasiswa', [BeasiswaController::class, 'Beasiswa'])->name('Beasiswa');

     //sarana
     Route::get('/Sarana', [SaranaController::class, 'Sarana'])->name('Sarana');

     //join JoinResearch
     Route::get('/JoinResearch', [JoinResearchController::class, 'JoinResearch'])->name('JoinResearch');

    //pelatihan
     Route::get('/pelatihan', [pelatihanController::class, 'pelatihan'])->name('pelatihan');



     Route::resource('users', UserController::class);
     });