@extends('admin.app')
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
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
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
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-top">1</td>
                            <td class=" align-top">1306220008076</td>
                            <td class=" align-top">NIB</td>
                            <td class=" align-top"> HENRY G. PADAGA</td>
                            <td class=" align-top">Prov. Sulawesi Tengah</td>
                            <td class=" align-top">Kab. Poso</td>
                            <td class=" align-top">Nasional</td>
                            <td class="align-top">Perusahaan Nasional Berstandar Tinggi</td>
                            <td class="align-top">Sme@negeri1</td>
                            <td class="align-top">
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                        class="btn btn-danger btn-sm" data-bs-placement="top" title="Update data"
                                        id="updateButton">
                                        <i data-feather='trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade text-start" id="tambah" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Tambah Dudi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Rombel</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">NIB</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Terbit / SK Pendirian</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Tipe</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class=" my-1">
                        <label for="label-form">Nama Peserta Lain </label>
                        <textarea type="text" class="form-control"> </textarea>

                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="select2 form-select" id="province">
                                <option value="" hidden>Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="regency" class="form-label">Kabupaten/Kota</label>
                            <select class="select2 form-select" id="regency">
                                <option value="" hidden>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="district" class="form-label">Kecamatan</label>
                            <select class="select2 form-select" id="district">
                                <option value="" hidden>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="village" class="form-label">Desa</label>
                            <select class="select2 form-select" id="village">
                                <option value="" hidden>Pilih Desa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Email Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">No. Telp. Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                        <select class="select2 form-select" id="select2-multiple" multiple>
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Lingkup Kerjasama</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Kriteria Mitra</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Klasifikasi</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Klasifikasi</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
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
                                    <form action="#" class="invoice-repeater">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row g-4 mb-1">
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nama</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Email</label>
                                                        <input type="email" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Hp</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
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
                                                        <select class="form-select" id="basicSelectGender"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                                            <option class="dropdown-item">Laki-Laki</option>
                                                            <option class="dropdown-item">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectIdentity">Jenis
                                                            Identitas</label>
                                                        <select class="form-select" id="basicSelectIdentity"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                                            <option class="dropdown-item">Ktp</option>
                                                            <option class="dropdown-item">Paspor</option>
                                                            <option class="dropdown-item">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Identitas</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label"
                                                            for="basicSelectNationality">Kewarganegaraan</label>
                                                        <select class="form-select" id="basicSelectNationality"
                                                            data-bs-toggle="pill" aria-expanded="true">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice repeater -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade text-start" id="edit" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">edit Dudi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Rombel</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Nama</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">NIB</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Terbit / SK Pendirian</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Tipe</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class=" my-1">
                        <label for="label-form">Nama Peserta Lain </label>
                        <textarea type="text" class="form-control"> </textarea>

                    </div>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="province" class="form-label">Provinsi</label>
                            <select class="select2 form-select" id="province">
                                <option value="" hidden>Pilih Provinsi</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="regency" class="form-label">Kabupaten/Kota</label>
                            <select class="select2 form-select" id="regency">
                                <option value="" hidden>Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="district" class="form-label">Kecamatan</label>
                            <select class="select2 form-select" id="district">
                                <option value="" hidden>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="village" class="form-label">Desa</label>
                            <select class="select2 form-select" id="village">
                                <option value="" hidden>Pilih Desa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">Email Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-0">
                            <label for="nameBasic" class="form-label">No. Telp. Mitra</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="select2-multiple">Klasifikasi Baku Lapangan Usaha (KBLI)</label>
                        <select class="select2 form-select" id="select2-multiple" multiple>
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Lingkup Kerjasama </label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Lingkup Kerjasama</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Kriteria Mitra</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Kriteria Mitra</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
                        </select>
                    </div>
                    <div class="my-1">
                        <label class="form-label" for="basicSelect1">Klasifikasi</label>
                        <select name="" id="" class="form-select">
                            <option value="" hidden>Pilih Klasifikasi</option>
                            <option class="dropdown-item">Nasional</option>
                            <option class="dropdown-item">Internasional</option>
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
                                    <form action="#" class="invoice-repeater">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row g-4 mb-1">
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nama</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Email</label>
                                                        <input type="email" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Hp</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
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
                                                        <select class="form-select" id="basicSelectGender"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Kelamin</option>
                                                            <option class="dropdown-item">Laki-Laki</option>
                                                            <option class="dropdown-item">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basicSelectIdentity">Jenis
                                                            Identitas</label>
                                                        <select class="form-select" id="basicSelectIdentity"
                                                            data-bs-toggle="pill" aria-expanded="true">
                                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                                            <option class="dropdown-item">Ktp</option>
                                                            <option class="dropdown-item">Paspor</option>
                                                            <option class="dropdown-item">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="nameBasic" class="form-label">Nomor Identitas</label>
                                                        <input type="text" id="nameBasic" class="form-control"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label class="form-label"
                                                            for="basicSelectNationality">Kewarganegaraan</label>
                                                        <select class="form-select" id="basicSelectNationality"
                                                            data-bs-toggle="pill" aria-expanded="true">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice repeater -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

      {{-- modal view --}}
    <div class="modal fade text-start" id="view" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
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
                                                                <td class="fw-bolder">
                                                                    Nama
                                                                </td>
                                                                <td>:</td>
                                                                <td>MAXXIMA HERSAM SOLUSI</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">
                                                                    Tipe
                                                                </td>
                                                                <td>:</td>
                                                                <td>NIB</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">
                                                                    NIB
                                                                </td>
                                                                <td>:</td>
                                                                <td>20566343</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">
                                                                    Tanggal Terbit / SK Pendirian
                                                                </td>
                                                                <td>:</td>
                                                                <td>12 December 2018</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder"> Alamat</td>
                                                                <td>:</td>
                                                                <td style="vertical-align: top;">KOMPLEK REGENCY RUKO NEW
                                                                    CARIBBEAN BLOK W6 NO.8, 38/, -
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="mt-1">
                                                        <label class="fw-bolder" for="">Klasifikasi Baku Lapangan
                                                            Usaha (KBLI):</label>
                                                        <table>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>Perdagangan Besar Mobil Bekas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.</td>
                                                                <td>Perdagangan Besar Mesin, Peralatan Dan Perlengkapan
                                                                    Lainnya</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-1">

                                                </div>
                                                <div class="col">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bolder">Email Mitra</td>
                                                                <td>:</td>
                                                                <td>hr@maxximasolusi.co.id / herisagung@maxximasolusi.co.id
                                                                </td>
                                                            </tr>
                                                            <tr class="mt-2">
                                                                <td class="fw-bolder" style="padding: 8px">No. Telp. Mitra
                                                                </td>
                                                                <td>:</td>
                                                                <td>082352999200 / 0542-8709047</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Kriteria Mitra</td>
                                                                <td>:</td>
                                                                <td>Perusahaan Nasional Berstandar Tinggi</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder">Lingkup Kerjasama </td>
                                                                <td>:</td>
                                                                <td>Nasional</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder"> Provinsi</td>
                                                                <td>:</td>
                                                                <td>prov. kalimantan timur</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder"> Kabupaten/Kota</td>
                                                                <td>:</td>
                                                                <td>Kota Balikpapan</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder"> Kecamatan</td>
                                                                <td>:</td>
                                                                <td>Kec. Balikpapan timur</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bolder"> Kelurahan</td>
                                                                <td>:</td>
                                                                <td>Sepinggan baru</td>
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
                                            <table class=" table ">
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
                                                <tbody>
                                                    <tr>
                                                        <td class="align-top">1</td>
                                                        <td class=" align-top">1306220008076</td>
                                                        <td class=" align-top">NIB</td>
                                                        <td class=" align-top"> HENRY G. PADAGA</td>
                                                        <td class=" align-top">Prov. Sulawesi Tengah</td>
                                                        <td class=" align-top">Kab. Poso</td>
                                                        <td class=" align-top">Nasional</td>
                                                        <td class="align-top">Perusahaan Nasional Berstandar Tinggi</td>
                                                    </tr>
                                                </tbody>
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
    </div>{{-- modal view end --}}



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
            });
        </script>
    @endsection
