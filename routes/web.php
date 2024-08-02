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
    Route::get('/dashboard/chart', [AdminController::class, 'showChart'])->name('chart.index');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/implementation', [AdminController::class, 'implementation'])->name('implementation');
//     Route::get('/companion', [AdminController::class, 'companion'])->name('companion');

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


Route::get('/DosenTamu', [DosenTamuController::class, 'DosenTamu'])->name('dosentamu.index');
Route::get('/DosenTamu/Pelaksanaan/{id}', [DosenTamuController::class, 'IsiData'])->name('dosentamu.isidata');
Route::post('/DosenTamu/Pelaksanaan/store', [DosenTamuController::class, 'store'])->name('dosentamu.store');
Route::get('/DosenTamu/Pelaksanaan/show/{id}', [DosenTamuController::class, 'show'])->name('dosentamu.show');
Route::get('/DosenTamu/Pelaksanaan/edit/{id}', [DosenTamuController::class, 'edit'])->name('dosentamu.edit');
Route::put('/DosenTamu/Pelaksanaan/update/{id}', [DosenTamuController::class, 'update'])->name('dosentamu.update');
Route::delete('/DosenTamu/Pelaksanaan/{id}', [DosenTamuController::class, 'destroy'])->name('dosentamu.destroy');

Route::get('/pkldosen', [PklDosenController::class, 'PklDosen'])->name('pkldosen.index');
Route::get('/pkldosen/isiDataTenagaPendidikan/{id}', [PklDosenController::class, 'IsiDatapkldosen'])->name('pkldosen.isidata');
Route::post('/pkldosen/isiDataTenagaPendidikan/store', [PklDosenController::class, 'store'])->name('pkldosen.store');
Route::get('/pkldosen/isiDataTenagaPendidikan/show/{id}', [PklDosenController::class, 'show'])->name('pkldosen.show');
Route::delete('/pkldosen/isiDataTenagaPendidikan/{id}', [PklDosenController::class, 'destroy'])->name('pkldosen.destroy');

// Route::get('/Pkl_mhs', [PklMhsController::class, 'Pkl_mahasiswa'])->name('Pkl_mahasiswa');
Route::get('/pkl_mhs', [PklMhsController::class, 'Pkl_mahasiswa'])->name('pkl-mhs.index');
Route::get('/pkl_mhs/isipelaksanaan/{id}', [PklMhsController::class, 'isipelaksanaan'])->name('pkl-mhs.isipelaksanaan');
Route::post('/pkl_mhs/isipelaksanaan/store', [PklMhsController::class, 'store'])->name('pkl-mhs.store');
Route::get('/pkl_mhs/isipelaksanaan/show/{id}', [PklMhsController::class, 'show'])->name('pkl-mhs.show');
Route::get('/pkl_mhs/isipelaksanaan/edit/{id}', [PklMhsController::class, 'edit'])->name('pkl-mhs.edit');
Route::put('/pkl_mhs/isipelaksanaan/update/{id}', [PklMhsController::class, 'update'])->name('pkl-mhs.update');
Route::delete('/pkl_mhs/isipelaksanaan/{id}', [PklMhsController::class, 'destroy'])->name('pkl-mhs.destroy');

    //sertiikasi
   // Route: Sertifikasi
Route::get('/sertifikasi', [SertifikasiController::class, 'Sertifikasi'])->name('Sertifikasi');
Route::get('/sertifikasi/IsiSertifikasi/{id}', [SertifikasiController::class, 'IsiSertifikasi'])->name('IsiSertifikasi');
Route::post('/sertifikasi/IsiSertifikasi/store', [SertifikasiController::class, 'store'])->name('Sertifikasi.store');
Route::get('/sertifikasi/IsiSertifikasi/show/{id}', [SertifikasiController::class, 'show'])->name('Sertifikasi.show');
Route::delete('/sertifikasi/IsiSertifikasi/{id}', [SertifikasiController::class, 'destroy'])->name('Sertifikasi.destroy');

//RisetTerapan
Route::get('/RisetTerapan', [RisetTerapanController::class, 'RisetTerapan'])->name('RisetTerapan');
Route::get('/RisetTerapan/isiRisetTerapan/{id}', [RisetTerapanController::class, 'isiRisetTerapan'])->name('isiRisetTerapan');
Route::post('/RisetTerapan/isiRisetTerapan/store', [RisetTerapanController::class, 'store'])->name('isiRisetTerapan.store');
Route::get('/RisetTerapan/isiRisetTerapan/show/{id}', [RisetTerapanController::class, 'show'])->name('isiRisetTerapan.show');
Route::delete('/RisetTerapan/isiRisetTerapan/{id}', [RisetTerapanController::class, 'destroy'])->name('isiRisetTerapan.destroy');

//Penyerapan Lulusan
Route::get('/Penyerapan', [LulusanController::class, 'PenyerapanLulusan'])->name('PenyerapanLulusan');
Route::get('/Penyerapan/isiPenyerapan/{id}', [LulusanController::class, 'isiPenyerapan'])->name('isiPenyerapan');
Route::post('/Penyerapan/isiPenyerapan/store', [LulusanController::class, 'store'])->name('isiPenyerapan.store');
Route::get('/Penyerapan/isiPenyerapan/show/{id}', [LulusanController::class, 'show'])->name('isiPenyerapan.show');
Route::delete('/Penyerapan/isiPenyerapan/{id}', [LulusanController::class, 'destroy'])->name('isiPenyerapan.destroy');

     //beasiswa
Route::get('/beasiswa', [BeasiswaController::class, 'Beasiswa'])->name('Beasiswa');
Route::get('/beasiswa/isi-beasiswa/{id}', [BeasiswaController::class, 'isiBeasiswa'])->name('isi.beasiswa');
Route::post('/beasiswa/isi-beasiswa/store', [BeasiswaController::class, 'store'])->name('isi-beasiswa.store');
Route::get('/beasiswa/isi-beasiswa/show/{id}', [BeasiswaController::class, 'show'])->name('isi-beasiswa.show');
Route::delete('/beasiswa/isi-beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('isi-beasiswa.destroy');

     //sarana
Route::get('/Sarana', [SaranaController::class, 'Sarana'])->name('Sarana');
Route::get('/Sarana/isi-sarana/{id}', [SaranaController::class, 'isiSarana'])->name('isi.sarana');
Route::post('/Sarana/isi-sarana/store', [SaranaController::class, 'store'])->name('isi-sarana.store');
Route::get('/Sarana/isi-sarana/show/{id}', [SaranaController::class, 'show'])->name('isi-sarana.show');
Route::delete('/Sarana/isi-sarana/{id}', [SaranaController::class, 'destroy'])->name('isi-sarana.destroy');

     //join JoinResearch
Route::get('/JoinResearch', [JoinResearchController::class, 'JoinResearch'])->name('JoinResearch');
Route::get('/JoinResearch/isi-join-research/{id}', [JoinResearchController::class, 'isiJoinResearch'])->name('isi-join-research.research');
Route::post('/JoinResearch/isi-join-research/store', [JoinResearchController::class, 'store'])->name('isi-join-research.store');
Route::get('/JoinResearch/isi-join-research/show/{id}', [JoinResearchController::class, 'show'])->name('isi-join-research.show');
Route::delete('/JoinResearch/isi-join-research/{id}', [JoinResearchController::class, 'destroy'])->name('isi-join-research.destroy');

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
 
 //companion
 Route::resource('companions', CompanionController::class);
 Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('companion', CompanionController::class);
 });
 
Route::resource('users', UserController::class);
});