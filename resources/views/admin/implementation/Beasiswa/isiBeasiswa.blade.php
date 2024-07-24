@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>ISI DATA BEASISWA/IKATAN DINAS -DINAS
            PENDIDIKAN PROVINSI JAWA BARAT</h4>

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
                            <th>Deskripsi</th>
                            <th>Jumlah Peserta</th>
                            <th>Sumber Biaya </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">PT. AIR DAN UDARA INDONESIA</td>
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
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" data-bs-backdrop="static" tabindex="-1"
        style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="col ">
                        <label class="form-label" for="exampleFormControlTextarea1">Nama/Keterangan </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Isikan Nama Dan Keterangan..."></textarea>
                    </div>
                    <div class="row g-2 my-1">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control invoice-edit-input date-picker" />
                        </div>
                    </div>
                    <div class="card-body">
                        <label for=""> Sumber Biaya </label>
                        <hr>
                        <div class="card body p-2">
                            <label class="mb-1" for=""> Nominal Biaya dari Dunia Kerja</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_dari_dunia_kerja" />
                                <span class="input-group-text">.00</span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Satuan Pendidikan</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_dari_satuan_pendidikan" />
                                <span class="input-group-text">.00</span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Daerah</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_dari_pemerintah_daerah" />
                                <span class="input-group-text">.00</span>
                            </div>
                            <label class="mb-1" for=""> Nominal Biaya dari Pemerintah Pusat</label>
                            <div class="input-group input-group-merge mb-2">
                                <span class="input-group-text">RP.</span>
                                <input type="number" class="form-control" placeholder="100"
                                    aria-label="Amount (to the nearest dollar)" name="biaya_dari_pemerintah_pusat" />
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4 class="mt-2 text-center">Pilih Peserta</h4>
                        <hr>
                        <h4 class="text-center">Data Mahasiswa</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="certificationmhs">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemname">Nama</label>
                                                <input type="text" class="form-control"
                                                    name="certificationmhs[][nama]" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">NIM</label>
                                                <input type="text" class="form-control" name="certificationmhs[][nim]"
                                                    placeholder="Masukan NIM" required>
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
                                                <label class="form-label" for="itemname">Tempat Lahir</label>
                                                <input type="text" class="form-control"
                                                    name="certificationmhs[][tempat_lahir]"
                                                    placeholder="Masukan Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="fp-default">Tanggal Lahir</label>
                                                <input type="date" class="form-control"
                                                    name="certificationmhs[][tanggal_lahir]">
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
                                                <label class="form-label" for="mahasiswaGender">Jenis Kelamin</label>
                                                <select name="certificationmhs[][jenis_kelamin]" class="form-select">
                                                    <option value="" hidden>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
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
                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>Add New</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Data PENANGGUNG JAWAB</h4>
                        <hr>
                        <div class="card-body invoice-repeater">
                            <div data-repeater-list="certificationpjs">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemname">Nama</label>
                                                <input type="text" class="form-control"
                                                    name="certificationpjs[][nama]" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">NIDN</label>
                                                <input type="text" class="form-control"
                                                    name="certificationpjs[][nidn]" placeholder="Masukan NIDN" required>
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
                                                <input type="text" class="form-control"
                                                    name="certificationpjs[][prodi]" placeholder="Masukan Prodi">
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
                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>Add New</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <section id="toastr-types">
                            <button type="button" id="type-success2222" class="btn btn-outline-success">simpan</button>
                        </section>
                    </div>
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
