@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Invoice /</span>INSTRUKTUR/PENDAMPING DUDI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "data-bs-toggle="modal"
                        data-bs-target="#modalToggle" type="submit"><i class="bx bx-plus-circle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg> Tambah
                    </button> </div>
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Rombel</th>
                            <th>Pendamping dari Industri</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Jumlah Dosen</th>
                            <th>Jumlah Instruktur DUDI</th>
                            <th>Jumlah Biaya Total</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">PT. AIR DAN UDARA INDONESIA</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Update data"><i data-feather='edit'></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="hapus data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Rombel</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row g-2">
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
                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label class="form-label" for="basicSelect">Tempat</label>
                            <select class="form-select" id="basicSelect" data-bs-toggle="pill" aria-expanded="true">
                                <option value="" selected disabled>Pilih Tempat</option>
                                <option class="dropdown-item">Dalam Negeri</option>
                                <option class="dropdown-item">Luar Negeri</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Foto/dokumen (.pdf/.jpg/.png/.jpeg)</label>
                            <input class="form-control" type="file" id="formFile" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label" for="numeral-formatting">Biaya Per Mahasiswa</label>
                            <input type="text" class="form-control numeral-mask" placeholder="10,000"
                                id="numeral-formatting" />
                        </div>
                        <div class="col mb-0">




                        </div>
                    </div>
                    <div class="card-body">
                        <label for=""> Sumber Biaya </label>
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="pill" href="#home"
                                    aria-expanded="true">Dunia Kerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="pill" href="#profile"
                                    aria-expanded="false">Satuan Pendidikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="pill" href="#profile2"
                                    aria-expanded="false">P. Daerah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="pill" href="#profile3"
                                    aria-expanded="false">P. pusat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="about-tab" data-bs-toggle="pill" href="#about"
                                    aria-expanded="false">Cost sharing</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <hr>
                            <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab"
                                aria-expanded="true">
                                <label class="mb-1" for=""> Nominal Biaya dari Dunia Kerja</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                                aria-expanded="false">
                                <label class="mb-1" for=""> Nominal Biaya dari Satuan Pendidikan</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab"
                                aria-expanded="false">
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Daerah</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3" role="tabpanel" aria-labelledby="profile-tab"
                                aria-expanded="false">
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Pusat</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="tab-pane" id="about" role="tabpanel" aria-labelledby="about-tab"
                                aria-expanded="false">
                                <label class="mb-1" for=""> Nominal Biaya dari Satuan Pendidikan</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for=""> Nominal Biaya dari DUDI</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Daerah</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                                <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Pusat</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text">RP.</span>
                                    <input type="text" class="form-control" placeholder="100"
                                        aria-label="Amount (to the nearest dollar)" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-2 text-center">Pilih Peserta</h4>
                    <hr>
                    <p class="text-center">Program Studi Perancangan Manufaktur</p>
                    <hr>
                    <ul class="nav nav-pills d-flex justify-content-between">
                        <li class="nav-item row " style="height: 50%">
                            <span class="col">0</span>
                            <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa"
                                aria-expanded="true">Mahasiswa</a>
                        </li>
                        <li class="nav-item nav-pill-success row">
                            <span class="col" style="height: 30%">0</span>
                            <a class="nav-link nav-pill-secondary col" id="profile-tab" data-bs-toggle="pill"
                                href="#Dosen" aria-expanded="false">Dosen</a>
                        </li>
                        <li class="nav-item row">
                           <span class="col" style="height: 50%">0</span>
                            <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#DUDI"
                                aria-expanded="false">Instruktur</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="Mahasiswa" aria-labelledby="home-tab"
                            aria-expanded="true">
                            <p style="background-color: rgb(249, 192, 192)">
                                Belum ada data yang dipilih!
                            </p>
                            <button type="button" class="btn btn-primary" data-bs-target="#modalToggle2"
                            data-bs-toggle="modal"><i data-feather='users'></i>pilih</button>
                        </div>
                        <div class="tab-pane" id="Dosen" role="tabpanel" aria-labelledby="profile-tab"
                            aria-expanded="false">
                            <p style="background-color: rgb(249, 192, 192)">
                                Belum ada data yang dipilih!
                            </p>
                            <button type="button" class="btn btn-secondary" data-bs-target="#modalToggle3"
                            data-bs-toggle="modal"><i data-feather='user-plus'></i>pilih</button>
                        </div>
                        <div class="tab-pane" id="DUDI" role="tabpanel" aria-labelledby="about-tab"
                            aria-expanded="false">
                            <p style="background-color: rgb(249, 192, 192)">
                                Belum ada data yang dipilih!
                            </p>
                             <button type="button" class="btn btn-success" data-bs-target="#modalToggle4"
                            data-bs-toggle="modal"><i data-feather='briefcase'></i>pilih</button>
                        </div>

                    </div>
                                  <hr>
                        <h4 class="mt-2 text-center">Dosen Penanggung Jawab</h4>
                        <ul class="nav nav-pills d-flex justify-content-around">

                            <li class="nav-item">
                                <button type="button" class="btn btn-success" data-bs-target="#modalToggle5"
                                    data-bs-toggle="modal"><i data-feather='briefcase'></i>pilih</button>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab"
                                aria-expanded="true">
                                <p style="background-color: rgb(249, 192, 192)">
                                    Belum ada pic yang dipilih!
                                </p>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal mahasiswa-->
    <div class="modal fade" id="modalToggle2" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel2">Form Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="form-control-repeater">
                        <div class="row">
                            <!-- Invoice repeater -->
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <form action="#" class="invoice-repeater">
                                            <div data-repeater-list="invoice">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Nama</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost">Nim</label>
                                                                <input type="number" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="32" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Tempat
                                                                    Lahir</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="fp-default">Tanggal
                                                                    Lahir</label>
                                                                <input type="date"
                                                                    class="form-control invoice-edit-input date-picker" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="d-block form-label">Gender</label>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadiojq1"
                                                                        name="validationRadiojq"
                                                                        class="form-check-input" />
                                                                    <label class="form-check-label"
                                                                        for="validationRadiojq1">Male</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="validationRadiojq2"
                                                                        name="validationRadiojq"
                                                                        class="form-check-input" />
                                                                    <label class="form-check-label"
                                                                        for="validationRadiojq2">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                            </div>
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
                    </section>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal dosen-->
    <div class="modal fade" id="modalToggle3" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel2">Form Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="form-control-repeater">
                        <div class="row">
                            <!-- Invoice repeater -->
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <form action="#" class="invoice-repeater">
                                            <div data-repeater-list="invoice">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Nama</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost">NIDN</label>
                                                                <input type="number" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="32" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Tempat
                                                                    Lahir</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="fp-default">Tanggal
                                                                    Lahir</label>
                                                                <input type="date"
                                                                    class="form-control invoice-edit-input date-picker" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="d-block form-label">Jenis Kelamin</label>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadiojq1"
                                                                        name="validationRadiojq"
                                                                        class="form-check-input" />
                                                                    <label class="form-check-label"
                                                                        for="validationRadiojq1">Male</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="validationRadiojq2"
                                                                        name="validationRadiojq"
                                                                        class="form-check-input" />
                                                                    <label class="form-check-label"
                                                                        for="validationRadiojq2">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                            </div>
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
                    </section>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal instruktur dudi-->
    <div class="modal fade" id="modalToggle4" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel2">Form Tambah Data Instruktur Dudi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="form-control-repeater">
                        <div class="row">
                            <!-- Invoice repeater -->
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <form action="#" class="invoice-repeater">
                                            <div data-repeater-list="invoice">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost">No.ID</label>
                                                                <input type="number" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="32" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Nama</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Jabatan</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="fp-default">No.
                                                                    Telepon</label>
                                                                <input type="number"
                                                                    class="form-control invoice-edit-input date-picker" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">

                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Email</label>
                                                                <input type="email" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                            </div>
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
                    </section>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Dosen Penanggung Jawab-->
    <div class="modal fade" id="modalToggle5" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel2">Modal 5</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="form-control-repeater">
                        <div class="row">
                            <!-- Invoice repeater -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="#" class="invoice-repeater">
                                            <div data-repeater-list="invoice">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Nama</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost">NIDN</label>
                                                                <input type="number" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="32" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-5 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemname">Prodi</label>
                                                                <input type="text" class="form-control" id="itemname"
                                                                    aria-describedby="itemname"
                                                                    placeholder="Masukan Nama" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-12">
                                                        </div>
                                                        <div class="col-md-2 col-12 mb-50">
                                                            <div class="mb-1">
                                                            </div>
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
                    </section>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    document.getElementById('basicSelect').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.classList.contains('dropdown-item')) {
            const target = selectedOption.getAttribute('href');
            if (target) {
                var tab = new bootstrap.Tab(document.querySelector(target));
                tab.show();
            }
        }
    });
</script>

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection
