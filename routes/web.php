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

// Resource route untuk CRUD operations
Route::resource('dudi', TambahdudiController::class);

// Tambah rute tambahan jika diperlukan
Route::post('/tambahdudi/store', [TambahdudiController::class, 'store'])->name('tambahdudi.store');
Route::get('/tambahdudi/{id}', [TambahdudiController::class, 'show'])->name('tambahdudi.show');
Route::delete('/dudi/{id}', [TambahdudiController::class, 'destroy'])->name('dudi.destroy');
Route::get('/tambahDudi', [TambahdudiController::class, 'tambahDudi'])->name('tambahDudi');
Route::get('/get-klasifikasi/{kriteriaId}', [TambahdudiController::class, 'getKlasifikasi']);
Route::get('/dudi/{id}', [TambahdudiController::class, 'show'])->name('dudi.show');

// Rute untuk edit dan update
Route::get('/dudi/{id}/edit', [TambahdudiController::class, 'edit'])->name('dudi.edit');
Route::put('/dudi/{id}', [TambahdudiController::class, 'update'])->name('dudi.update');

Route::get('/dudi/{id}/detail', [TambahdudiController::class, 'detail'])->name('dudi.detail');


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

Route::post('/pkl-mhs/store', [PklMhsController::class, 'store'])->name('pkl-mhs.store');
    Route::get('/Pkl_mhs', [PklMhsController::class, 'Pkl_mahasiswa'])->name('Pkl_mahasiswa');
    Route::get('/pkl_mhs', [PklMhsController::class, 'Pkl_mahasiswa'])->name('pkl-mhs.index');
Route::get('/pkl_mhs/isipelaksanaan/{id}', [PklMhsController::class, 'isipelaksanaan'])->name('pkl-mhs.isipelaksanaan');
Route::post('/pkl_mhs/store', [PklMhsController::class, 'store'])->name('pkl-mhs.store');

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
Route::get('/isi-beasiswa/{id}', [BeasiswaController::class, 'isiBeasiswa'])->name('isi.beasiswa');

     //sarana
     Route::get('/Sarana', [SaranaController::class, 'Sarana'])->name('Sarana');
 Route::get('/isi-sarana/{id}', [SaranaController::class, 'isiSarana'])->name('isi.sarana');

     //join JoinResearch
     Route::get('/JoinResearch', [JoinResearchController::class, 'JoinResearch'])->name('JoinResearch');
  Route::get('/isi-join-research/{id}', [JoinResearchController::class, 'isiJoinResearch'])->name('isi.join.research');

    //pelatihan
     Route::get('/pelatihan', [pelatihanController::class, 'pelatihan'])->name('pelatihan');
Route::get('/isi-pelatihan/{id}', [PelatihanController::class, 'isiPelatihan'])->name('isi.pelatihan');

     //cooperation

     Route::get('/DataDocument', [CooperationController::class, 'DataDocument'])->name('DataDocument');
Route::post('/itemkerjasama/store', [CooperationController::class, 'storeItemKerjasama'])->name('itemkerjasama.store');

Route::get('/cooperation', [CooperationController::class, 'cooperation'])->name('cooperation');
Route::post('/cooperation/store', [CooperationController::class, 'store'])->name('cooperation.store');
Route::get('/cooperation/{id}/edit', [CooperationController::class, 'edit'])->name('cooperation.edit');
Route::put('/cooperation/{id}', [CooperationController::class, 'update'])->name('cooperation.update');
Route::delete('/cooperation/{id}', [CooperationController::class, 'destroy'])->name('cooperation.destroy');


     Route::resource('users', UserController::class);
     });