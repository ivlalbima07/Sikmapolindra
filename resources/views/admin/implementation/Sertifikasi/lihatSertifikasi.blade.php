@extends('admin.app')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>DETAIL DATA</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="back-button">
    <button class="btn btn-secondary mb-3" onclick="window.history.back()"> <i data-feather='arrow-left'></i>Kembali</button>
  </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Nama Rombongan Belajar</strong></td>
                        <td>Program Magang Industri Mahasiswa</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Mulai</strong></td>
                        <td>01 Juli 2023</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Selesai</strong></td>
                        <td>15 Desember 2023</td>
                    </tr>
                    <tr>
                        <td><strong>Nominal Biaya dari Satuan Pendidikan</strong></td>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <td><strong>Nominal Biaya dari Pemerintah Daerah</strong></td>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <td><strong>Nominal Biaya dari Pemerintah Pusat</strong></td>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <td><strong>Nominal Biaya dari DUDI</strong></td>
                        <td>Rp. 0</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <p class="text-center bold">Daftar Peserta</p>
            <hr>
            <ul class="nav nav-pills d-flex justify-content-between">
                <li class="nav-item row " style="height: 50%">
                    <span class="col">0</span>
                    <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa"
                        aria-expanded="true">Mahasiswa</a>
                </li>
                <li class="nav-item nav-pill-success row">
                    <span class="col" style="height: 30%">0</span>
                    <a class="nav-link nav-pill-secondary col" id="profile-tab" data-bs-toggle="pill" href="#Dosen"
                        aria-expanded="false">Dosen</a>
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
                                       <div class="card-datatables table-responsive">
                <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "data-bs-toggle="modal"
                        data-bs-target="#modalToggle" type="submit"><i class="bx bx-plus-circle"></i>
                        <i data-feather='plus-circle'></i> Tambah
                    </button> </div>
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="hapus data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                            <button type="button" class="btn btn-primary" data-bs-target="#modalToggle2"
                            data-bs-toggle="modal"><i data-feather='users'></i>pilih</button>
                        </div>
                        <div class="tab-pane" id="Dosen" role="tabpanel" aria-labelledby="profile-tab"
                            aria-expanded="false">
                            <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "data-bs-toggle="modal"
                        data-bs-target="#modalToggle" type="submit"><i class="bx bx-plus-circle"></i>
                        <i data-feather='plus-circle'></i> Tambah
                    </button> </div>
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Nim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class=" align-top">Teknik Informatika</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="hapus data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                            <button type="button" class="btn btn-secondary" data-bs-target="#modalToggle3"
                            data-bs-toggle="modal"><i data-feather='user-plus'></i>pilih</button>
                        </div>
                        <div class="tab-pane" id="DUDI" role="tabpanel" aria-labelledby="about-tab"
                            aria-expanded="false">
                           <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "data-bs-toggle="modal"
                        data-bs-target="#modalToggle" type="submit"><i class="bx bx-plus-circle"></i>
                        <i data-feather='plus-circle'></i> Tambah
                    </button> </div>
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="hapus data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                             <button type="button" class="btn btn-success" data-bs-target="#modalToggle4"
                            data-bs-toggle="modal"><i data-feather='briefcase'></i>pilih</button>
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
