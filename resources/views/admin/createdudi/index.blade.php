@extends('admin.app')
<style>
    .modal-body {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>DATA DUDI INTEGRASI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card">
                <div class="row">
                    <div class="col-md-9">
                        <label class="form-label" for="basicSelect">Basic Select</label>
                        <div class="input-group">
                            <button class="btn btn-outline-primary" type="button">
                                <i data-feather="search"></i>
                            </button>
                            <select class="form-select" id="basicSelect">
                                <option value="" hidden>Pilih</option>
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                            <button class="btn btn-outline-primary" type="button">Search !</button>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambah">Buat
                            DUDI</button>
                    </div>
                </div>
            </div>

            <div class="card-datatables table-responsive">
                <table class="table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIB/NPSN</th>
                            <th>Tipe</th>
                            <th>Nama Perseroan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Lingkup</th>
                            <th>Kategori Mitra</th>
                            <th>Owner</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dudis as $index => $dudi)
                            <tr>
                                <td class="align-top">{{ $index + 1 }}</td>
                                <td class="align-top">{{ $dudi->nib }}</td>
                                <td class="align-top">{{ $dudi->tipe }}</td>
                                <td class="align-top">{{ $dudi->nama_rombel }}</td>
                                <td class="align-top">{{ $dudi->province->name }}</td>
                                <td class="align-top">{{ $dudi->regency->name }}</td>
                                <td class="align-top">{{ $dudi->kerjasama }}</td>
                                {{-- @dd($dudi->kriteria) --}}
                                <td class="align-top">{{ $dudi->kriteria->nama }}</td>
                                <td class="align-top">{{ $dudi->nama }}</td>
                                <td class="align-top">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#view"
                                            class="btn btn-warning btn-sm viewButton" data-bs-placement="top" title="View data"
                                            data-id="{{ $dudi->id }}">
                                            <i data-feather='inbox'></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editdudi"
                                            class="btn btn-primary btn-sm editButton" data-bs-placement="top" title="Edit data" data-id="{{ $dudi->id }}">
                                            <i data-feather="edit"></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                            class="btn btn-danger btn-sm" data-bs-placement="top" title="Delete data">
                                            <i data-feather="trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form id="dudiForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Tambah Dudi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="id" name="id">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="namaRombel" class="form-label">Nama Rombel</label>
                                        <input type="text" id="namaRombel" name="nama_rombel" class="form-control" placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <div class="col mb-0">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter Name" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="nib" class="form-label">NIB</label>
                                        <input type="number" id="nib" name="nib" class="form-control" placeholder="Enter NIB" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="skPendirian" class="form-label">Tanggal Terbit / SK Pendirian</label>
                                        <input type="date" id="skPendirian" name="sk_pendirian" class="form-control invoice-edit-input date-picker" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="tipe" class="form-label">Tipe</label>
                                        <input type="text" id="tipe" name="tipe" class="form-control" placeholder="Enter Type" />
                                    </div>
                                </div>
                                <div class="my-1">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                </div>
                                <div class="row g-4">
                                    <div class="col mb-0">
                                        <label for="province" class="form-label">Provinsi</label>
                                        <select class="select2 form-select" id="province" name="province_id">
                                            <option value="" hidden>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="regency" class="form-label">Kabupaten/Kota</label>
                                        <select class="select2 form-select" id="regency" name="regency_id">
                                            <option value="" hidden>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="district" class="form-label">Kecamatan</label>
                                        <select class="select2 form-select" id="district" name="district_id">
                                            <option value="" hidden>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="village" class="form-label">Desa</label>
                                        <select class="select2 form-select" id="village" name="village_id">
                                            <option value="" hidden>Pilih Desa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 my-1">
                                    <div class="col mb-0">
                                        <label for="emailMitra" class="form-label">Email Mitra</label>
                                        <input type="email" id="emailMitra" name="email_mitra" class="form-control" placeholder="Enter Email" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="telpMitra" class="form-label">No. Telp. Mitra</label>
                                        <input type="number" id="telpMitra" name="no_telp_mitra" class="form-control" placeholder="Enter Phone" />
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                                    <select class="select2 form-select" id="select2-multiple" name="kbli[]" multiple>
                                        @foreach ($kblis as $kbli)
                                            <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                                    <select name="kerjasama" id="" class="form-select">
                                        <option value="" hidden>Pilih Lingkup Kerjasama</option>
                                        <option value="nasional" class="dropdown-item">Nasional</option>
                                        <option value="internasional" class="dropdown-item">Internasional</option>
                                    </select>
                                </div>
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                                    <select name="kriteria_id" id="basicSelect1" class="form-select">
                                        <option value="" hidden>Pilih Kriteria Mitra</option>
                                        @foreach ($kriterias as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="my-1">
                                    <label class="form-label" for="basicSelect2">Klasifikasi</label>
                                    <select name="klasifikasi_id" id="basicSelect2" class="form-select">
                                        <option value="" hidden>Pilih Klasifikasi</option>
                                        <!-- Options will be populated dynamically -->
                                    </select>
                                </div>                                                       
                                
                                <hr>
                                <h4 class="text-center">Data Penanggung Jawab</h4>
                                <hr>
                                <div class="row">
                                    <!-- Invoice repeater -->
                                    <div class="col-12 my-1">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center">Data Penanggung Jawab</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Penanggung Jawab Section -->
                                                <div class="invoice-repeater">
                                                    <div data-repeater-list="penanggung_jawab">
                                                        <div data-repeater-item>
                                                            <div class="row g-4 mb-1">
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNama" class="form-label">Nama</label>
                                                                    <input type="text" id="penanggungJawabNama" name="penanggung_jawab[][nama]" class="form-control" placeholder="Enter Name" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabEmail" class="form-label">Email</label>
                                                                    <input type="email" id="penanggungJawabEmail" name="penanggung_jawab[][email]" class="form-control" placeholder="Enter Email" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNoHp" class="form-label">Nomor Hp</label>
                                                                    <input type="number" id="penanggungJawabNoHp" name="penanggung_jawab[][no_hp]" class="form-control" placeholder="Enter Phone" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="row g-4">
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabGender">Jenis Kelamin</label>
                                                                    <select class="form-select" id="penanggungJawabGender" name="penanggung_jawab[][jenis_kelamin]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                                        <option value="laki-laki">Laki-Laki</option>
                                                                        <option value="perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabIdentity">Jenis Identitas</label>
                                                                    <select class="form-select" id="penanggungJawabIdentity" name="penanggung_jawab[][jenis_identitas]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Jenis Identitas</option>
                                                                        <option value="KTP">KTP</option>
                                                                        <option value="SIM">SIM</option>
                                                                        <option value="Paspor">Paspor</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="penanggungJawabNoIdentitas" class="form-label">Nomor Identitas</label>
                                                                    <input type="text" id="penanggungJawabNoIdentitas" name="penanggung_jawab[][nomor_identitas]" class="form-control" placeholder="Enter ID Number" />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label class="form-label" for="penanggungJawabNationality">Kewarganegaraan</label>
                                                                    <select class="form-select" id="penanggungJawabNationality" name="penanggung_jawab[][kewarganegaraan]" data-bs-toggle="pill" aria-expanded="true">
                                                                        <option value="" hidden>Pilih Kewarganegaraan</option>
                                                                        <option value="WNI">WNI</option>
                                                                        <option value="WNA">WNA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>Add New</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Penanggung Jawab Section -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice repeater -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    


    {{-- modal view --}}
    <div class="modal fade text-start" id="view" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Manajemen Dudi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <section class="invoice-preview-wrapper">
                            <div class="row invoice-preview">
                                <div class="">
                                    <div class="card invoice-preview-card">
                                        <div class="card-body invoice-padding pb-0">
                                            <div class="row g-3 invoice-spacing">
                                                <div class="col">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bolder">Nama</td>
                                                                <td>:</td>
                                                                <td id="dudi-nama">MAXXIMA HERSAM SOLUSI</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Tipe</td>
                                                                <td>:</td>
                                                                <td id="dudi-tipe">NIB</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">NIB</td>
                                                                <td>:</td>
                                                                <td id="dudi-nib">20566343</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Tanggal Terbit / SK Pendirian</td>
                                                                <td>:</td>
                                                                <td id="dudi-sk">12 December 2018</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Alamat</td>
                                                                <td>:</td>
                                                                <td id="dudi-alamat" style="vertical-align: top;">KOMPLEK REGENCY RUKO NEW
                                                                    CARIBBEAN BLOK W6 NO.8, 38/, -
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="mt-1">
                                                        <label class="fw-bolder" for="">Klasifikasi Baku Lapangan Usaha (KBLI):</label>
                                                        <table id="dudi-kbli">
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>Perdagangan Besar Mobil Bekas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.</td>
                                                                <td>Perdagangan Besar Mesin, Peralatan Dan Perlengkapan Lainnya</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bolder">Email Mitra</td>
                                                                <td>:</td>
                                                                <td id="dudi-email">hr@maxximasolusi.co.id / herisagung@maxximasolusi.co.id</td>
                                                            </tr>
                                                            <tr class="mt-2">
                                                                <td class="fw-bolder">No. Telp. Mitra</td>
                                                                <td>:</td>
                                                                <td id="dudi-telp">082352999200 / 0542-8709047</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kriteria Mitra</td>
                                                                <td>:</td>
                                                                <td id="dudi-kriteria">Perusahaan Nasional Berstandar Tinggi</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Lingkup Kerjasama</td>
                                                                <td>:</td>
                                                                <td id="dudi-lingkup">Nasional</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Provinsi</td>
                                                                <td>:</td>
                                                                <td id="dudi-provinsi">prov. kalimantan timur</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kabupaten/Kota</td>
                                                                <td>:</td>
                                                                <td id="dudi-kabupaten">Kota Balikpapan</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kecamatan</td>
                                                                <td>:</td>
                                                                <td id="dudi-kecamatan">Kec. Balikpapan timur</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kelurahan</td>
                                                                <td>:</td>
                                                                <td id="dudi-kelurahan">Sepinggan baru</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="invoice-spacing" />
                                        <h4 class="text-center">Data Penanggung Jawab</h4>
                                        <hr class="invoice-spacing" />
                                        <div class="card-datatables table-responsive">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Nomer HP</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Jenis Identitas</th>
                                                        <th>Nomor Identitas</th>
                                                        <th>Kewarganegaraan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="penanggung-jawab-list">
                                                    <!-- Data penanggung jawab akan dimasukkan di sini melalui AJAX -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>{{-- modal view end --}}

    <div class="modal fade" id="editDudi" tabindex="-1" aria-labelledby="editDudiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form id="editDudiForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title" id="editDudiLabel">Edit Dudi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Copy form structure from tambahDudi form here -->
                        <!-- Remember to add 'value' attributes to prepopulate the data -->
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="namaRombel" class="form-label">Nama Rombel</label>
                                <input type="text" id="namaRombel" name="nama_rombel" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col mb-0">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter Name" />
                            </div>
                            <div class="col mb-0">
                                <label for="nib" class="form-label">NIB</label>
                                <input type="number" id="nib" name="nib" class="form-control" placeholder="Enter NIB" />
                            </div>
                            <div class="col mb-0">
                                <label for="skPendirian" class="form-label">Tanggal Terbit / SK Pendirian</label>
                                <input type="date" id="skPendirian" name="sk_pendirian" class="form-control invoice-edit-input date-picker" />
                            </div>
                            <div class="col mb-0">
                                <label for="tipe" class="form-label">Tipe</label>
                                <input type="text" id="tipe" name="tipe" class="form-control" placeholder="Enter Type" />
                            </div>
                        </div>
                        <div class="my-1">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="row g-4">
                            <select class="select2 form-select" id="edit_province" name="province_id">
                                <option value="" hidden>Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <select class="select2 form-select" id="edit_regency" name="regency_id">
                                <option value="" hidden>Pilih Kabupaten</option>
                            </select>
                            <select class="select2 form-select" id="edit_district" name="district_id">
                                <option value="" hidden>Pilih Kecamatan</option>
                            </select>
                            <select class="select2 form-select" id="edit_village" name="village_id">
                                <option value="" hidden>Pilih Desa</option>
                            </select>                            
                        </div>                        
                        <div class="row g-2 my-1">
                            <div class="col mb-0">
                                <label for="emailMitra" class="form-label">Email Mitra</label>
                                <input type="email" id="emailMitra" name="email_mitra" class="form-control" placeholder="Enter Email" />
                            </div>
                            <div class="col mb-0">
                                <label for="telpMitra" class="form-label">No. Telp. Mitra</label>
                                <input type="number" id="telpMitra" name="no_telp_mitra" class="form-control" placeholder="Enter Phone" />
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                            <select class="select2 form-select" id="select2-multiple" name="kbli[]" multiple>
                                @foreach ($kblis as $kbli)
                                    <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                                @endforeach
                            </select>
                        </div>                                
                        <div class="my-1">
                            <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                            <select name="kerjasama" id="" class="form-select">
                                <option value="" hidden>Pilih Lingkup Kerjasama</option>
                                <option value="nasional" class="dropdown-item">Nasional</option>
                                <option value="internasional" class="dropdown-item">Internasional</option>
                            </select>
                        </div>
                        <div class="my-1">
                            <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                            <select name="kriteria_id" id="basicSelect1" class="form-select">
                                <option value="" hidden>Pilih Kriteria Mitra</option>
                                @foreach ($kriterias as $kriteria)
                                    <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-1">
                            <label class="form-label" for="basicSelect2">Klasifikasi</label>
                            <select name="klasifikasi_id" id="basicSelect2" class="form-select">
                                <option value="" hidden>Pilih Klasifikasi</option>
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>      
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="edit_id" name="id">
                                <!-- Repeat the form fields as in tambahDudi form -->
                                <!-- Add value attributes or bind the values using jQuery in AJAX success callback -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    {{-- modal view --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });

        $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('#tambah')
            });

            $('#province').change(function() {
                var provinceID = $(this).val();
                if (provinceID) {
                    $.ajax({
                        url: '/getRegencies/' + provinceID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#regency').empty().append(
                                '<option hidden>Pilih Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                }
            });

            $('#regency').change(function() {
                var regencyID = $(this).val();
                if (regencyID) {
                    $.ajax({
                        url: '/getDistricts/' + regencyID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#district').empty().append(
                                '<option hidden>Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                }
            });

            $('#district').change(function() {
                var districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: '/getVillages/' + districtID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#village').empty().append('<option hidden>Pilih Desa</option>');
                            $.each(data, function(key, value) {
                                $('#village').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                }
            }); 

            $('#basicSelect1').change(function() {
                var kriteriaId = $(this).val();
                if (kriteriaId) {
                    $.ajax({
                        url: '/get-klasifikasi/' + kriteriaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#basicSelect2').empty();
                            $('#basicSelect2').append(
                                '<option value="" hidden>Pilih Klasifikasi</option>');
                            $.each(data, function(key, value) {
                                $('#basicSelect2').append('<option value="' + value.id +
                                    '">' + value.nama_klasifikasi + '</option>');
                            });
                        }
                    });
                } else {
                    $('#basicSelect2').empty();
                    $('#basicSelect2').append('<option value="" hidden>Pilih Klasifikasi</option>');
                }
            });

            $('.viewButton').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/tambahDudi/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        // console.log(data.penanggung_jawabs);

                        $('#dudi-nama').text(data.nama);
                        $('#dudi-tipe').text(data.tipe);
                        $('#dudi-nib').text(data.nib);
                        $('#dudi-sk').text(data.sk_pendirian);
                        $('#dudi-alamat').text(data.alamat);
                        $('#dudi-email').text(data.email_mitra);
                        $('#dudi-telp').text(data.no_telp_mitra);
                        $('#dudi-kriteria').text(data.nama);
                        $('#dudi-lingkup').text(data.kerjasama);
                        $('#dudi-provinsi').text(data.province.name);
                        $('#dudi-kabupaten').text(data.regency.name);
                        $('#dudi-kecamatan').text(data.district.name);
                        $('#dudi-kelurahan').text(data.village.name);
                        
                        // Klasifikasi Baku Lapangan Usaha (KBLI)
                        var kbliContent = '';
                    $.each(data.kblis, function(index, kbli) {
                        kbliContent += '<tr><td>' + (index + 1) + '. </td><td>' + kbli.nama + '</td></tr>';
                    });
                    $('#dudi-kbli').html(kbliContent);

                        // Data Penanggung Jawab
                        var pjContent = '';
                        $.each(data.penanggung_jawabs, function(index, pj) {
                            console.log();
                            pjContent += '<tr>';
                            pjContent += '<td>' + (index + 1) + '</td>';
                            pjContent += '<td>' + pj.nama + '</td>';
                            pjContent += '<td>' + pj.email + '</td>';
                            pjContent += '<td>' + pj.no_hp + '</td>';
                            pjContent += '<td>' + pj.jenis_kelamin + '</td>';
                            pjContent += '<td>' + pj.jenis_identitas + '</td>';
                            pjContent += '<td>' + pj.nomor_identitas + '</td>';
                            pjContent += '<td>' + pj.kewarganegaraan + '</td>';
                            pjContent += '</tr>';
                        });
                        $('#penanggung-jawab-list').html(pjContent);
                    },
                    error: function() {
                        alert('Failed to fetch data.');
                    }
                });
            });

            $('#dudiForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara default

                // Ambil data dari form
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('tambahDudi.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Dudi added successfully.',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        }).then(() => {
                            location.reload(); // Memuat ulang halaman setelah sukses
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.responseJSON.message,
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                    }
                });
            });

            $('.editButton').on('click', function() {
        var id = $(this).data('id');

        $.ajax({
            url: `/tambahDudi/${id}/edit`,
            method: 'GET',
            success: function(data) {
                $('#edit_id').val(data.id);
                $('#editDudiForm input[name="nama_rombel"]').val(data.nama_rombel);
                $('#editDudiForm input[name="nama"]').val(data.nama);
                $('#editDudiForm input[name="nib"]').val(data.nib);
                $('#editDudiForm input[name="sk_pendirian"]').val(data.sk_pendirian);
                $('#editDudiForm input[name="tipe"]').val(data.tipe);
                $('#editDudiForm textarea[name="alamat"]').val(data.alamat);

                $('#editDudiForm select[name="kriteria_id"]').val(data.kriteria_id).trigger('change');

                // Load klasifikasi options
                $.ajax({
                    url: `/get-klasifikasi/${data.kriteria_id}`,
                    method: 'GET',
                    success: function(klasifikasiData) {
                        $('#editDudiForm select[name="klasifikasi_id"]').empty().append('<option value="" hidden>Pilih Klasifikasi</option>');
                        $.each(klasifikasiData, function(key, value) {
                            $('#editDudiForm select[name="klasifikasi_id"]').append('<option value="' + value.id + '">' + value.nama_klasifikasi + '</option>');
                        });
                        $('#editDudiForm select[name="klasifikasi_id"]').val(data.klasifikasi_id).trigger('change.select2');
                    }
                });

                // Populate province, regency, district, village
                $('#editDudiForm select[name="province_id"]').val(data.province_id).trigger('change.select2');
                $.ajax({
                    url: `/getRegencies/${data.province_id}`,
                    method: 'GET',
                    success: function(regencies) {
                        $('#editDudiForm select[name="regency_id"]').empty().append('<option value="" hidden>Pilih Kabupaten</option>');
                        $.each(regencies, function(key, value) {
                            $('#editDudiForm select[name="regency_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#editDudiForm select[name="regency_id"]').val(data.regency_id).trigger('change.select2');

                        $.ajax({
                            url: `/getDistricts/${data.regency_id}`,
                            method: 'GET',
                            success: function(districts) {
                                $('#editDudiForm select[name="district_id"]').empty().append('<option value="" hidden>Pilih Kecamatan</option>');
                                $.each(districts, function(key, value) {
                                    $('#editDudiForm select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                                $('#editDudiForm select[name="district_id"]').val(data.district_id).trigger('change.select2');

                                $.ajax({
                                    url: `/getVillages/${data.district_id}`,
                                    method: 'GET',
                                    success: function(villages) {
                                        $('#editDudiForm select[name="village_id"]').empty().append('<option value="" hidden>Pilih Desa</option>');
                                        $.each(villages, function(key, value) {
                                            $('#editDudiForm select[name="village_id"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                        $('#editDudiForm select[name="village_id"]').val(data.village_id).trigger('change.select2');
                                    }
                                });
                            }
                        });
                    }
                });

                $('#editDudiForm input[name="email_mitra"]').val(data.email_mitra);
                $('#editDudiForm input[name="no_telp_mitra"]').val(data.no_telp_mitra);
                $('#editDudiForm select[name="kerjasama"]').val(data.kerjasama);

                // Handle KBLI
                var selectedKbli = data.kblis.map(function(kbli) {
                    return kbli.id;
                });
                $('#editDudiForm select[name="kbli[]"]').val(selectedKbli).trigger('change');

                // Handle penanggung jawab
                if (data.penanggung_jawab && Array.isArray(data.penanggung_jawab)) {
                    $('.invoice-repeater[data-repeater-list="penanggung_jawab"]').empty();
                    data.penanggung_jawab.forEach(function(pj, index) {
                        // Append new field and populate with data
                        $('.invoice-repeater[data-repeater-list="penanggung_jawab"]').append(
                            `<div data-repeater-item>
                                <div class="row g-4 mb-1">
                                    <div class="col mb-0">
                                        <label for="penanggungJawabNama" class="form-label">Nama</label>
                                        <input type="text" id="penanggungJawabNama" name="penanggung_jawab[${index}][nama]" class="form-control" placeholder="Enter Name" value="${pj.nama}" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="penanggungJawabEmail" class="form-label">Email</label>
                                        <input type="email" id="penanggungJawabEmail" name="penanggung_jawab[${index}][email]" class="form-control" placeholder="Enter Email" value="${pj.email}" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="penanggungJawabNoHp" class="form-label">Nomor Hp</label>
                                        <input type="number" id="penanggungJawabNoHp" name="penanggung_jawab[${index}][no_hp]" class="form-control" placeholder="Enter Phone" value="${pj.no_hp}" />
                                    </div>
                                    <div class="col mb-0">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <div class="col mb-0">
                                        <label class="form-label" for="penanggungJawabGender">Jenis Kelamin</label>
                                        <select class="form-select" id="penanggungJawabGender" name="penanggung_jawab[${index}][jenis_kelamin]" data-bs-toggle="pill" aria-expanded="true">
                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" ${pj.jenis_kelamin == 'laki-laki' ? 'selected' : ''}>Laki-Laki</option>
                                            <option value="perempuan" ${pj.jenis_kelamin == 'perempuan' ? 'selected' : ''}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label class="form-label" for="penanggungJawabIdentity">Jenis Identitas</label>
                                        <select class="form-select" id="penanggungJawabIdentity" name="penanggung_jawab[${index}][jenis_identitas]" data-bs-toggle="pill" aria-expanded="true">
                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                            <option value="KTP" ${pj.jenis_identitas == 'KTP' ? 'selected' : ''}>KTP</option>
                                            <option value="SIM" ${pj.jenis_identitas == 'SIM' ? 'selected' : ''}>SIM</option>
                                            <option value="Paspor" ${pj.jenis_identitas == 'Paspor' ? 'selected' : ''}>Paspor</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="penanggungJawabNoIdentitas" class="form-label">Nomor Identitas</label>
                                        <input type="text" id="penanggungJawabNoIdentitas" name="penanggung_jawab[${index}][nomor_identitas]" class="form-control" placeholder="Enter ID Number" value="${pj.nomor_identitas}" />
                                    </div>
                                    <div class="col mb-0">
                                        <label class="form-label" for="penanggungJawabNationality">Kewarganegaraan</label>
                                        <select class="form-select" id="penanggungJawabNationality" name="penanggung_jawab[${index}][kewarganegaraan]" data-bs-toggle="pill" aria-expanded="true">
                                            <option value="" hidden>Pilih Kewarganegaraan</option>
                                            <option value="WNI" ${pj.kewarganegaraan == 'WNI' ? 'selected' : ''}>WNI</option>
                                            <option value="WNA" ${pj.kewarganegaraan == 'WNA' ? 'selected' : ''}>WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>`
                        );
                    });
                }

                $('#editdudi').modal('show');
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: response.responseJSON.message,
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
            }
        });
    });

    $('#editDudiForm').on('submit', function(e) {
        e.preventDefault();

        var id = $('#edit_id').val();
        var formData = $(this).serialize();

        $.ajax({
            url: `/tambahDudi/${id}`,
            method: 'PUT',
            data: formData,
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Dudi updated successfully.',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(() => {
                    location.reload();
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: response.responseJSON.message,
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
            }
        });
    });

        });


    </script>
@endsection