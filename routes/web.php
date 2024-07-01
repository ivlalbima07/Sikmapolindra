<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\TambahdudiController;
use App\Http\Controllers\KriteriaMitraController;
use App\Http\Controllers\KlasifikasiBakuController;
use App\Http\Controllers\KlasifikasiController;
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
    Route::get('/implementation', [AdminController::class, 'implementation'])->name('implementation');
    Route::get('/companion', [AdminController::class, 'companion'])->name('companion');

    // operator

Route::get('/operator', [UserController::class, 'operator'])->name('operator.index');
Route::post('/operator/store', [UserController::class, 'store'])->name('operator.store');
Route::put('/operator/update/{id}', [UserController::class, 'update'])->name('operator.update');
Route::delete('/operator/delete/{id}', [UserController::class, 'destroy'])->name('operator.destroy');


Route::get('/tambahDudi', [TambahdudiController::class, 'tambahDudi'])->name('tambahDudi');
Route::post('/tambahDudi/store', [TambahdudiController::class, 'store'])->name('tambahDudi.store');
Route::get('/tambahDudi/{id}', [TambahdudiController::class, 'show'])->name('tambahDudi.show');
Route::get('/tambahDudi/{id}/edit', [TambahdudiController::class, 'edit'])->name('tambahDudi.edit');
Route::put('/tambahDudi/{id}', [TambahdudiController::class, 'update'])->name('tambahDudi.update');
Route::delete('/tambahDudi/delete/{id}', [TambahdudiController::class, 'destroy'])->name('tambahDudi.destroy');
Route::resource('kbli', KlasifikasiBakuController::class);
Route::resource('KlasifikasiBaku', KlasifikasiBakuController::class);
//   Route::get('/KlasifikasiBaku', [KlasifikasiBakuController::class, 'KlasifikasiBaku'])->name('KlasifikasiBaku');


// wilayah
Route::get('/getRegencies/{province_id}', [WilayahController::class, 'getRegencies']);
Route::get('/getDistricts/{regency_id}', [WilayahController::class, 'getDistricts']);
Route::get('/getVillages/{district_id}', [WilayahController::class, 'getVillages']);

// klasifikasi
//   Route::get('/klasifikasi', [KlasifikasiController::class, 'klasifikasi'])->name('klasifikasi');
Route::resource('klasifikasi', KlasifikasiController::class);
Route::get('/get-klasifikasi/{kriteria_id}', [KlasifikasiController::class, 'getKlasifikasiByKriteria']);



//   kriteria
Route::get('/Kriteria', [KriteriaMitraController::class, 'index'])->name('Kriteria');
Route::post('/Kriteria', [KriteriaMitraController::class, 'store'])->name('Kriteria.store');
Route::put('/Kriteria/{id}', [KriteriaMitraController::class, 'update'])->name('Kriteria.update');
Route::delete('/Kriteria/{id}', [KriteriaMitraController::class, 'destroy'])->name('Kriteria.destroy');

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
    Route::get('/IsiSertifikasi', [SertifikasiController::class, 'IsiSertifikasi'])->name('IsiSertifikasi');

    //RisetTerapan
     Route::get('/RisetTerapan', [RisetTerapanController::class, 'RisetTerapan'])->name('RisetTerapan');
     Route::get('/isiRisetTerapan', [RisetTerapanController::class, 'isiRisetTerapan'])->name('isiRisetTerapan');

     //Penyerapan Lulusan
     Route::get('/Penyerapan', [LulusanController::class, 'PenyerapanLulusan'])->name('PenyerapanLulusan');
     Route::get('/isiPenyerapan', [LulusanController::class, 'isiPenyerapan'])->name('isiPenyerapan');


     //beasiswa
     Route::get('/beasiswa', [BeasiswaController::class, 'Beasiswa'])->name('Beasiswa');
     Route::get('/isiBeasiswa', [BeasiswaController::class, 'isiBeasiswa'])->name('isiBeasiswa');

     //sarana
     Route::get('/Sarana', [SaranaController::class, 'Sarana'])->name('Sarana');
     Route::get('/isiSarana', [SaranaController::class, 'isiSarana'])->name('isiSarana');

     //join JoinResearch
     Route::get('/JoinResearch', [JoinResearchController::class, 'JoinResearch'])->name('JoinResearch');
     Route::get('/isiJoinResearch', [JoinResearchController::class, 'isiJoinResearch'])->name('isiJoinResearch');

    //pelatihan
     Route::get('/pelatihan', [pelatihanController::class, 'pelatihan'])->name('pelatihan');


     //cooperation
     Route::get('/cooperation', [CooperationController::class, 'cooperation'])->name('cooperation');
     Route::get('/DataDocument', [CooperationController::class, 'DataDocument'])->name('DataDocument');



     Route::resource('users', UserController::class);
     });