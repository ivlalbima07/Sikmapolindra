@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span> Data DUDI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill " data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" type="submit"><i class="bx bx-plus-circle"></i>
                    <i data-feather='plus-circle'></i> Tambah data Kerjasama DUDI
                </button> </div>
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table" style="width:100%; ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. pks</th>
                            <th>Tgl. <BR>mulai</BR></th>
                            <th>Tgl. <BR>selesai</BR></th>
                            <th>Nama</th>
                            <th>Item kerja sama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center align-top">1</th>
                            <td class=" align-top">2333/PL42.11/AL.04/2022 -- 1381/UN40.K1/HK.07.01/2022</td>
                            <td class="text-center align-top">2022-08-12</td>
                            <td class="text-center align-top">2022-08-12</td>
                            <td style="text-align: left;">Pelaksanaan Kegiatan Matching Fund 2022 Dengan Judul Aplikasi
                                Smart Proctoring System Dalam
                                Menunjang Pengawasan Ujian Online Dengan Menerapkan Teknologi Computer Vision</td>
                            <td class=" align-top" style="text-align: left;">UNIVERSITAS PENDIDIKAN INDONESIA
                                D3 Teknik Informatika
                                - Riset Terapan</td>
                            <td class="text-center align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- tambah document --}}
                                    <button type="button" class="btn btn-success btn-sm"
                                        onclick="location.href='/DataDocument'" title="document"><i
                                            data-feather='file'></i></button>
                                    {{-- update nota kesepakatan --}}
                                    <button type="button" class="btn btn-info btn-sm"data-bs-toggle="modal"
                                        data-bs-target="#defaultSize2"title="update data nota kesapakatan">
                                        <i data-feather='folder'></i></button>
                                </div>
                                <BR></BR>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- tambah data kerjasama --}}
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#defaultSize" title="Tambah Data"><i
                                            data-feather='plus-circle'></i></button>
                                    {{-- button hapus --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Hapus Data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal tambah item kerjasama --}}
    <div class="modal fade text-start" id="defaultSize" tabindex="-1" aria-labelledby="myModalLabel18"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div>

                        <h4 class="modal-title" id="myModalLabel18">Form Tambah Item Kerja Sama</h4>
                        <br>
                        <p class="text-primary">UNIVERSITAS PENDIDIKAN INDONESIA</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 my-1">
                        <div class="card">

                            <div class="card-body invoice-repeater">
                                <div data-repeater-list="invoice">
                                    <div data-repeater-item>
                                        <div class="row g-3 mb-1">
                                            <div class="col mb-0">
                                                <label class="form-label" for="basicSelectIdentity">Jenis
                                                    Identitas</label>
                                                <select class="form-select" id="basicSelectIdentity" data-bs-toggle="pill"
                                                    aria-expanded="true">
                                                    <option value="" hidden>Pilih Jenis Identitas</option>
                                                    <option class="dropdown-item">Ktp</option>
                                                    <option class="dropdown-item">Paspor</option>
                                                    <option class="dropdown-item">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col mb-0">
                                                <label class="form-label" for="basicSelectIdentity">Jenis
                                                    Identitas</label>
                                                <select class="form-select" id="basicSelectIdentity" data-bs-toggle="pill"
                                                    aria-expanded="true">
                                                    <option value="" hidden>Pilih Jenis Identitas</option>
                                                    <option class="dropdown-item">Ktp</option>
                                                    <option class="dropdown-item">Paspor</option>
                                                    <option class="dropdown-item">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col mb-0">
                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                    type="button">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Delete</span>
                                                </button>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>



    {{-- modal upload pks --}}
    <div class="modal fade text-start" id="defaultSize2" tabindex="-1" aria-labelledby="myModalLabel18"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Default Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-1">
                            <label for="nameBasic" class="form-label">Nama Pks</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Nomor PKS*</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Pks</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control invoice-edit-input date-picker" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-1">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Selesai</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control invoice-edit-input date-picker" />
                            </div>
                        </div>
                    </div>
                    <div class="col ">
                        <label for="nameBasic" class="form-label">Lampiran Bukti</label>
                        <input class="form-control" type="file" id="formFile" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal tambah -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Data Perusahaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col mb-1">
                            <label for="nameBasic" class="form-label">dudi</label>
                            <select class="select2 form-select" name="" id=""></select>
                        </div>
                        <div class="col mb-1">
                            <label for="nameBasic" class="form-label">Nama Pks</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Nomor PKS*</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Pks</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control invoice-edit-input date-picker" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-1">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Selesai</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control invoice-edit-input date-picker" />
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <label for="nameBasic" class="form-label">Lampiran Bukti</label>
                        <input class="form-control" type="file" id="formFile" />
                    </div>
                    <div class="card-body invoice-repeater">
                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                                <div class="row g-3 mb-1">
                                    <div class="col mb-0">
                                        <label class="form-label" for="basicSelectIdentity">Program Studi</label>
                                        <select class="form-select" id="basicSelectIdentity" data-bs-toggle="pill"
                                            aria-expanded="true">
                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                            <option class="dropdown-item">Ktp</option>
                                            <option class="dropdown-item">Paspor</option>
                                            <option class="dropdown-item">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <label class="form-label" for="basicSelectIdentity">Bidang Kerjasama</label>
                                        <select class="form-select" id="basicSelectIdentity" data-bs-toggle="pill"
                                            aria-expanded="true">
                                            <option value="" hidden>Pilih Jenis Identitas</option>
                                            <option class="dropdown-item">Ktp</option>
                                            <option class="dropdown-item">Paspor</option>
                                            <option class="dropdown-item">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col mb-0">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Delete</span>
                                        </button>
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
                 <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection
