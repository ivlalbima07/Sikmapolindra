@extends('layouts.header')

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
            <!-- Table for DUDI data -->
            <div class="card-datatables table-responsive">
                <table id="dudiTable" class="datatables table table-borderless table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIB/NPSN</th>
                            <th>Tipe</th>
                            <th>Nama Perseroan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Lingkup</th>
                            <th>kriteria Mitra</th>
                            <th>Owner</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dudis as $dudi)
                            <tr>
                                <td class="align-top">{{ $loop->iteration }}</td>
                                <td class="align-top">{{ $dudi->nib }}</td>
                                <td class="align-top">{{ $dudi->tipe }}</td>
                                <td class="align-top">{{ $dudi->nama_perseroan }}</td>
                                <td class="align-top">{{ $dudi->provinsi->name }}</td>
                                <td class="align-top">{{ $dudi->kabupaten->name }}</td>
                                <td class="align-top">{{ $dudi->lingkupkerjasama }}</td>
                                <td class="align-top">{{ $dudi->kriteria->nama }}</td>
                                <td class="align-top">user</td>
                                <td class="">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-info viewDudi" data-id="{{ $dudi->id }}"
                                            data-bs-toggle="modal" data-bs-target="#viewModal">
                                            <i data-feather='inbox'></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#update" data-id="{{ $dudi->id }}"
                                            class="btn btn-primary btn-sm editButton" data-bs-placement="top" title="Update data">
                                            <i data-feather='edit'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm delete-button"
                                            data-bs-placement="top" title="Hapus data" data-id="{{ $dudi->id }}">
                                            <i data-feather='trash'></i>
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

    <!-- Modal view -->
    <div class="modal fade text-start" id="viewModal" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Manajemen Dudi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <section class="invoice-preview-wrapper">
                            <div class="row invoice-preview">
                                <!-- Invoice -->
                                <div class="">
                                    <div class="card invoice-preview-card">
                                        <div class="card-body invoice-padding pb-0">
                                            <!-- Header starts -->
                                            <div class="row g-3 invoice-spacing">
                                                <div class="col">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bolder">Nama</td>
                                                                <td>:</td>
                                                                <td id="nama-perseroan"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Tipe</td>
                                                                <td>:</td>
                                                                <td id="tipe"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">NIB</td>
                                                                <td>:</td>
                                                                <td id="nib"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Tanggal Terbit / SK Pendirian</td>
                                                                <td>:</td>
                                                                <td id="tanggal_terbit"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Alamat</td>
                                                                <td>:</td>
                                                                <td id="alamat"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="mt-1">
                                                        <label class="fw-bolder">Klasifikasi Baku Lapangan Usaha
                                                            (KBLI):</label>
                                                        <table id="klasifikasi_baku"></table>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bolder">Email Mitra</td>
                                                                <td>:</td>
                                                                <td id="email_mitra"></td>
                                                            </tr>
                                                            <tr class="mt-2">
                                                                <td class="fw-bolder" style="padding: 8px">No. Telp. Mitra
                                                                </td>
                                                                <td>:</td>
                                                                <td id="no_mitra"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kriteria Mitra</td>
                                                                <td>:</td>
                                                                <td id="kriteria"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Lingkup Kerjasama</td>
                                                                <td>:</td>
                                                                <td id="lingkupkerjasama"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Provinsi</td>
                                                                <td>:</td>
                                                                <td id="provinsi"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kabupaten/Kota</td>
                                                                <td>:</td>
                                                                <td id="kabupaten"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kecamatan</td>
                                                                <td>:</td>
                                                                <td id="kecamatan"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kelurahan</td>
                                                                <td>:</td>
                                                                <td id="desa"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Header ends -->
                                        </div>
                                        <hr class="invoice-spacing" />
                                        <h4 class="text-center">Data Penanggung Jawab</h4>
                                        <hr class="invoice-spacing" />
                                        <div class="card-datatables table-responsive">
                                            <table class="table">
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
                                                <tbody id="penanggung_jawab_table"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice -->
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade text-start" id="tambah" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('tambahdudi.store') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col mb-3">
                                <label for="nama_perseroan" class="form-label">Nama Perseroan</label>
                                <input type="text" id="nama_perseroan" name="nama_perseroan" class="form-control"
                                    placeholder="Masukkan Nama Perseroan" required>
                            </div>
                            <div class="col mb-3">
                                <label for="nib" class="form-label">NIB</label>
                                <input type="text" id="nib" name="nib" class="form-control"
                                    placeholder="Masukkan NIB" required>
                            </div>
                            <div class="col mb-3">
                                <label for="tanggal_terbit" class="form-label">Tanggal Terbit / SK Pendirian</label>
                                <input type="date" id="tanggal_terbit" name="tanggal_terbit" class="form-control"
                                    required>
                            </div>
                            <div class="col mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <input type="text" id="tipe" name="tipe" class="form-control"
                                    placeholder="Masukkan Tipe" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="row g-4">
                            <div class="col mb-3">
                                <label for="province" class="form-label">Provinsi</label>
                                <select class="select2 form-select" id="province" name="provinsi" required>
                                    <option value="" hidden>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="regency" class="form-label">Kabupaten/Kota</label>
                                <select class="select2 form-select" id="regency" name="kabupaten" required>
                                    <option value="" hidden>Pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="district" class="form-label">Kecamatan</label>
                                <select class="select2 form-select" id="district" name="kecamatan" required>
                                    <option value="" hidden>Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="village" class="form-label">Desa</label>
                                <select class="select2 form-select" id="village" name="desa" required>
                                    <option value="" hidden>Pilih Desa</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col mb-3">
                                <label for="email_mitra" class="form-label">Email Mitra</label>
                                <input type="email" id="email_mitra" name="email_mitra" class="form-control"
                                    placeholder="Masukkan Email" required>
                            </div>
                            <div class="col mb-3">
                                <label for="no_mitra" class="form-label">No. Telp. Mitra</label>
                                <input type="text" id="no_mitra" name="no_mitra" class="form-control"
                                    placeholder="Masukkan Nomor Telepon" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha
                                (KBLI)</label>
                            <select class="select2 form-select" id="select2-multiple" name="klasifikasi_baku[]" multiple
                                required>
                                @foreach ($kblis as $kbli)
                                    <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lingkupkerjasama">Lingkup Kerjasama</label>
                            <select id="lingkupkerjasama" name="lingkupkerjasama" class="form-select" required>
                                <option value="" hidden>Pilih Lingkup Kerjasama</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kriteria">Kriteria Mitra</label>
                            <select id="kriteria" name="kriteria" onchange="handleKriteriaMitra(this)"
                                class="form-select" required>
                                <option value="" hidden>Pilih Kriteria Mitra</option>
                                @foreach ($kriterias as $kriteria)
                                    <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="klasifikasi">Klasifikasi</label>
                            <select id="klasifikasi" name="klasifikasi" class="form-select" required>
                                <option value="" hidden>Pilih Klasifikasi</option>
                            </select>
                        </div>
                        <hr>
                        <h4 class="text-center">Data Penanggung Jawab</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12 my-1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title text-center">Data Penanggung Jawab</h4>
                                    </div>
                                    <!-- Invoice repeater -->
                                    <div class="card-body invoice-repeater">
                                        <div data-repeater-list="pj">
                                            <div data-repeater-item>
                                                <div class="row g-4 mb-1">
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nama</label>
                                                        <input name="pj_nama" type="text" id="nameBasic"
                                                            class="form-control" placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Email</label>
                                                        <input name="pj_email" type="email" id="nameBasic"
                                                            class="form-control" placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Hp</label>
                                                        <input name="pj_nomor_hp" type="text" id="nameBasic"
                                                            class="form-control" placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row g-4 ">
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectGender">Jenis
                                                            Kelamin</label>
                                                        <select name="pj_jenis_kelamin" class="form-select"
                                                            id="basicSelectGender" data-bs-toggle="pill"
                                                            aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                                            <option class="dropdown-item">Laki-Laki</option>
                                                            <option class="dropdown-item">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectIdentity">Jenis
                                                            Identitas</label>
                                                        <select name="pj_jenis_identitas" class="form-select"
                                                            id="basicSelectIdentity" data-bs-toggle="pill"
                                                            aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                                            <option class="dropdown-item">Ktp</option>
                                                            <option class="dropdown-item">Paspor</option>
                                                            <option class="dropdown-item">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Identitas</label>
                                                        <input name="pj_nomor_identitas" type="text" id="nameBasic"
                                                            class="form-control" placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label"
                                                            for="basicSelectNationality">Kewarganegaraan</label>
                                                        <select name="pj_kewarganegaraan" class="form-select"
                                                            id="basicSelectNationality" data-bs-toggle="pill"
                                                            aria-expanded="true">
                                                            <option value="" hidden>Pilih Kewarganegaraan</option>
                                                            <option class="dropdown-item">WNI</option>
                                                            <option class="dropdown-item">WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button"
                                                    data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /Invoice repeater -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" id="save-btn" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- modal update --}}
<!-- Modal Update -->
<div class="modal fade text-start" id="update" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Update Dudi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateDudiForm">
                    <input type="hidden" id="dudi_id" name="dudi_id">
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="updateName" class="form-label">Nama</label>
                            <input type="text" id="updateName" name="update_nama" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="updateNIB" class="form-label">NIB</label>
                            <input type="text" id="updateNIB" name="update_nib" class="form-control" placeholder="Enter NIB" />
                        </div>
                        <div class="col mb-0">
                            <label for="updateTanggalTerbit" class="form-label">Tanggal Terbit / SK Pendirian</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" id="updateTanggalTerbit" name="update_tanggal_terbit" />
                        </div>
                        <div class="col mb-0">
                            <label for="updateTipe" class="form-label">Tipe</label>
                            <input type="text" id="updateTipe" name="update_tipe" class="form-control" placeholder="Enter Tipe" />
                        </div>
                    </div>
                    <div class="my-1">
                        <label for="updatePesertaLain" class="form-label">Nama Peserta Lain</label>
                        <textarea class="form-control" id="updatePesertaLain" name="update_peserta_lain"></textarea>
                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="updateProvince" class="form-label">Provinsi</label>
                            <select class="select2 form-select" id="updateProvince" name="update_provinsi">
                                <option value="" hidden>Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="updateRegency" class="form-label">Kabupaten/Kota</label>
                            <select class="select2 form-select" id="updateRegency" name="update_kabupaten">
                                <option value="" hidden>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="updateDistrict" class="form-label">Kecamatan</label>
                            <select class="select2 form-select" id="updateDistrict" name="update_kecamatan">
                                <option value="" hidden>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="updateVillage" class="form-label">Desa</label>
                            <select class="select2 form-select" id="updateVillage" name="update_desa">
                                <option value="" hidden>Pilih Desa</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label for="updateEmailMitra" class="form-label">Email Mitra</label>
                            <input type="text" id="updateEmailMitra" name="update_email_mitra" class="form-control" placeholder="Enter Email Mitra" />
                        </div>
                        <div class="col mb-0">
                            <label for="updateNoTelpMitra" class="form-label">No. Telp. Mitra</label>
                            <input type="text" id="updateNoTelpMitra" name="update_no_telp_mitra" class="form-control" placeholder="Enter No. Telp. Mitra" />
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="updateSelect2Multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                        <select class="select2 form-select" id="updateSelect2Multiple" name="update_klasifikasi_baku" multiple>
                            @foreach ($kblis as $kbli)
                                <option value="{{ $kbli->id }}">{{ $kbli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="updateSelectLingkup">Lingkup Kerjasama</label>
                        <select id="updateSelectLingkup" name="update_lingkup_kerjasama" class="form-select">
                            <option value="" hidden>Pilih Lingkup Kerjasama</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="updateSelectKriteria">Kriteria Mitra</label>
                        <select id="updateSelectKriteria" name="update_kriteria_mitra" class="form-select">
                            <option value="" hidden>Pilih Kriteria Mitra</option>
                            @foreach ($kriterias as $kriteria)
                                <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="updateSelectKlasifikasi">Klasifikasi</label>
                        <select id="updateSelectKlasifikasi" name="update_klasifikasi" class="form-select">
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
                                <div class="card-body invoice-repeater">
                                    <div data-repeater-list="invoice">
                                        <div data-repeater-item>
                                            <div class="row g-4 mb-1">
                                                <div class="col mb-0">
                                                    <label for="updateNamaPJ" class="form-label">Nama</label>
                                                    <input type="text" id="updateNamaPJ" name="update_nama_pj" class="form-control" placeholder="Enter Nama" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateEmailPJ" class="form-label">Email</label>
                                                    <input type="email" id="updateEmailPJ" name="update_email_pj" class="form-control" placeholder="Enter Email" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateNoHpPJ" class="form-label">Nomor Hp</label>
                                                    <input type="text" id="updateNoHpPJ" name="update_no_hp_pj" class="form-control" placeholder="Enter Nomor Hp" />
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
                                                    <label class="form-label" for="updateSelectGender">Jenis Kelamin</label>
                                                    <select class="form-select" id="updateSelectGender" name="update_jenis_kelamin_pj">
                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                        <option class="dropdown-item">Laki-Laki</option>
                                                        <option class="dropdown-item">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col mb-0">
                                                    <label class="form-label" for="updateSelectIdentity">Jenis Identitas</label>
                                                    <select class="form-select" id="updateSelectIdentity" name="update_jenis_identitas_pj">
                                                        <option value="" hidden>Pilih Jenis Identitas</option>
                                                        <option class="dropdown-item">Ktp</option>
                                                        <option class="dropdown-item">Paspor</option>
                                                        <option class="dropdown-item">Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="updateNoIdentitasPJ" class="form-label">Nomor Identitas</label>
                                                    <input type="text" id="updateNoIdentitasPJ" name="update_no_identitas_pj" class="form-control" placeholder="Enter Nomor Identitas" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label class="form-label" for="updateSelectNationality">Kewarganegaraan</label>
                                                    <select class="form-select" id="updateSelectNationality" name="update_kewarganegaraan_pj">
                                                        <option value="" hidden>Pilih Kewarganegaraan</option>
                                                        <option class="dropdown-item">WNI</option>
                                                        <option class="dropdown-item">WNA</option>
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
                            </div>
                        </div>
                        <!-- /Invoice repeater -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        function handleKriteriaMitra(data) {
            var kriteriaId = data.value;
            if (kriteriaId) {
                $.ajax({
                    url: '/get-klasifikasi/' + kriteriaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#klasifikasi').empty().append('<option value="" hidden>Pilih Klasifikasi</option>');
                        $.each(data, function(key, value) {
                            $('#klasifikasi').append('<option value="' + value.id + '">' + value
                                .nama_klasifikasi + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error); // Debugging
                    }
                });
            } else {
                $('#klasifikasi').empty().append('<option value="" hidden>Pilih Klasifikasi</option>');
            }
        };

        $(document).ready(function() {
            // Trigger the AJAX call on save button click
            $('#save-btn').click(function(e) {

                e.preventDefault();
                const formData = $('form').serialize();

                $.ajax({
                    url: '{{ route('tambahdudi.store') }}',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Data saved successfully!');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan dalam menyimpan data');
                    }
                });
            });

            // Event listener for cascading dropdowns
            $('#province').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/getRegencies/' + provinceId,
                        type: 'GET',
                        data: {
                            province_id: provinceId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#regency').empty();
                            $('#district').empty();
                            $('#village').empty();
                            $('#regency').append(
                                '<option value="">Pilih Kabupaten/Kota</option>');
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#regency').empty();
                    $('#district').empty();
                    $('#village').empty();
                }
            });

            $('#regency').change(function() {
                var regencyId = $(this).val();
                if (regencyId) {
                    $.ajax({
                        url: '/getDistricts/' + regencyId,
                        type: 'GET',
                        data: {
                            regency_id: regencyId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty();
                            $('#village').empty();
                            $('#district').append('<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                    $('#village').empty();
                }
            });

            $('#district').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/getVillages/' + districtId,
                        type: 'GET',
                        data: {
                            district_id: districtId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#village').empty();
                            $('#village').append('<option value="">Pilih Desa</option>');
                            $.each(data, function(key, value) {
                                $('#village').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#village').empty();
                }
            });

            $('#select2-multiple').select2({
                placeholder: "Pilih Klasifikasi Baku",
                allowClear: true
            });

            // Repeater for Penanggung Jawab
            $('#tambah').on('click', '[data-repeater-create]', function() {
                var $template = $('#tambah [data-repeater-list="penanggung_jawab"]').find(
                    '[data-repeater-item]').last();
                var $clone = $template.clone();
                $clone.find('input').val('');
                $clone.find('select').val('');
                $clone.insertAfter($template);
            });

            $('#tambah').on('click', '[data-repeater-delete]', function() {
                $(this).closest('[data-repeater-item]').remove();
            });


            $('#tambahDudiForm').on('submit', function(event) {
                event.preventDefault();
                let formData = $(this).serialize(); // Prevent default form submission

                $.ajax({
                    type: "POST",
                    url: "{{ route('dudi.store') }}",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Add the new row to the table
                            let dudi = response.data;
                            let newRow = `<tr id="dudi_${dudi.id}">
                                            <td>${dudi.id}</td>
                                            <td>${dudi.nib}</td>
                                            <td>${dudi.tipe}</td>
                                            <td>${dudi.nama_perseroan}</td>
                                            <td>${dudi.provinsi.name}</td>
                                            <td>${dudi.kabupaten.name}</td>
                                            <td>${dudi.lingkupkerjasama}</td>
                                            <td>${dudi.kriteria.nama}</td>
                                            <td>user</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#view"
                                                        class="btn btn-warning btn-sm" data-bs-placement="top" title="Update data"
                                                        id="updateButton">
                                                        <i data-feather='inbox'></i>
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                                        class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data"
                                                        id="updateButton">
                                                        <i data-feather='edit'></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm delete-button"
                                                        data-bs-placement="top" title="Hapus data" data-id="${dudi.id}">
                                                        <i data-feather='trash-2'></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>`;
                            $('#dudiTable tbody').append(newRow);
                            $('#tambah').modal('hide');
                            $('#tambahDudiForm')[0].reset();
                            alert(response.message);
                        } else {
                            alert('Data gagal disimpan');
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        alert('Terjadi kesalahan');
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const url = `/dudi/${id}`;

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data ini tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-outline-danger ms-1'
                        },
                        buttonsStyling: false
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Deleted!',
                                            text: 'Data telah dihapus.',
                                            customClass: {
                                                confirmButton: 'btn btn-success'
                                            }
                                        }).then(() => {
                                            location
                                                .reload(); // Refresh halaman setelah penghapusan berhasil
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: 'Terjadi kesalahan saat menghapus data',
                                            customClass: {
                                                confirmButton: 'btn btn-danger'
                                            }
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Terjadi kesalahan saat menghapus data',
                                        customClass: {
                                            confirmButton: 'btn btn-danger'
                                        }
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(function() {
            const table = $('.datatables').DataTable({
                "drawCallback": function(settings) {
                    feather.replace();
                }
            })
        });
        $(document).ready(function() {
            $(document).on("click", '.viewDudi', function() {
                var id = $(this).data("id");

                $.ajax({
                    url: `/dudi/${id}`,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Update modal fields with data
                        $("#nama-perseroan").text(data.nama_perseroan);
                        $("#tipe").text(data.tipe);
                        $("#nib").text(data.nib);
                        $("#tanggal_terbit").text(data.tanggal_terbit);
                        $("#alamat").text(data.alamat);
                        $("#email_mitra").text(data.email_mitra);
                        $("#no_mitra").text(data.no_mitra);
                        $("#kriteria").text(data.kriteria.nama);
                        $("#lingkupkerjasama").text(data.lingkupkerjasama);
                        $("#provinsi").text(data.provinsi.name);
                        $("#kabupaten").text(data.kabupaten.name);
                        $("#kecamatan").text(data.kecamatan.name);
                        $("#desa").text(data.desa.name);

                        // Handle klasifikasi baku
                        var klasifikasiBakuTable = $("#klasifikasi_baku");
                        klasifikasiBakuTable.empty(); // Clear previous data
                        $.each(data.klasifikasi_baku, function(index, kbli) {
                            console.log(kbli);
                            klasifikasiBakuTable.append(
                                `<tr><td>${kbli.nama}</td></tr>`
                            );
                        });

                        // Handle penanggung jawab
                        var penanggungJawabTable = $("#penanggung_jawab_table");
                        penanggungJawabTable.empty(); // Clear previous data
                        $.each(data.penanggung_jawabs, function(index, pj) {
                            penanggungJawabTable.append(
                                `<tr>
                            <td>${index + 1}</td>
                            <td>${pj.nama}</td>
                            <td>${pj.email}</td>
                            <td>${pj.nomor_hp}</td>
                            <td>${pj.jenis_kelamin}</td>
                            <td>${pj.jenis_identitas}</td>
                            <td>${pj.nomor_identitas}</td>
                            <td>${pj.kewarganegaraan}</td>
                        </tr>`
                            );
                        });
                    }
                });
            });
        });
    </script>
@endsection
