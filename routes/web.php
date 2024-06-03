<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
    Route::get('/operator', [AdminController::class, 'operator'])->name('operator');

    //sub_companion
    Route::get('/DosenTamu', [AdminController::class, 'DosenTamu'])->name('DosenTamu');
    Route::get('/Pkl_mhs', [AdminController::class, 'Pkl_mahasiswa'])->name('Pkl_mahasiswa');
    Route::get('/isipelaksanaan', [AdminController::class, 'isipelaksanaan'])->name('isipelaksanaan');
});