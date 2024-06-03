@extends('admin.app')



@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">INSTRUKTUR/</span>PENDAMPING DUDI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill " data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" type="submit"><i class="bx bx-plus-circle"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg> Tambah
                </button> </div>
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 20%">Nama</th>
                            <th>Jabatan</th>
                            <th>NO Telepon</th>
                            <th>Email</th>
                            <th>Asal DUDI</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="text-center align-top">Staf</td>
                            <td class="text-center align-top">081287632225</td>
                            <td class="text-center align-top">gusniawana@yahoo.com</td>
                            <td class=" align-top"> <span style="font-size:.8125rem;">DIREKTORAT KELEMBAGAAN DAN SUMBER DAYA
                                    PENDIDIKAN TINGGI VOKASI
                                    DIREKTORAT JENDERAL
                                    PENDIDIKAN VOKASI</span></td>
                            <td class="text-center align-top">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modaledit"
                                        class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data"
                                        id="updateButton">
                                        <i data-feather='edit'></i>
                                    </button>

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


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="">Nik</label>
                    <div class="col mb-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Nik"
                                aria-describedby="button-addon2" />
                            <button class="btn btn-outline-primary" id="button-addon2" type="button">Go</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Nama</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Masukan Nama" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Email</label>
                                    <input type="email" class="form-control" id="basicInput"
                                        placeholder="Masukan email" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">No Telefon</label>
                                    <input type="number" class="form-control" id="basicInput"
                                        placeholder="0895547624361" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <label class="form-label" for="select2-disabled-result">Asal DUDI</label>
                                <select class="select2 form-select" id="select2-disabled-result">
                                    <option value="" selected disabled
                                        label="Add project members by name or email..."></option>
                                    <option value="2">Option2</option>
                                    <option value="3">Option3</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="form-label" for="basicInput">Jabatan Di Dudi</label>
                                <input type="text" class="form-control" id="basicInput"
                                    placeholder="Masukan Jabatan" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <label class="form-label" for="select2-disabled-result">Pendidikan Terakhir</label>
                                <select class="select2 form-select" id="select2-disabled-result">
                                    <option value="" label="Add project members by name or email..."></option>
                                    <option value="2">Option2</option>
                                    <option value="3">Option3</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="form-label" for="basicInput">Keahlian/Bidang Keahlian</label>
                                <input type="text" class="form-control" id="basicInput"
                                    placeholder="Masukan Keahlian" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modaledit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mb-1" for="">Nik</label>
                    <div class="col mb-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Nik"
                                aria-describedby="button-addon2" />
                            <button class="btn btn-outline-primary" id="button-addon2" type="button">Go</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Nama</label>
                                    <input type="text" class="form-control" id="basicInput"
                                        placeholder="Masukan Nama" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Email</label>
                                    <input type="email" class="form-control" id="basicInput"
                                        placeholder="Masukan email" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">No Telefon</label>
                                    <input type="number" class="form-control" id="basicInput"
                                        placeholder="0895547624361" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <label class="form-label" for="select2-disabled-result">Asal DUDI</label>
                                <select class="select2 form-select" id="select2-disabled-result">
                                    <option value="" selected disabled
                                        label="Add project members by name or email..."></option>
                                    <option value="2">Option2</option>
                                    <option value="3">Option3</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="form-label" for="basicInput">Jabatan Di Dudi</label>
                                <input type="text" class="form-control" id="basicInput"
                                    placeholder="Masukan Jabatan" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                <label class="form-label" for="select2-disabled-result">Pendidikan Terakhir</label>
                                <select class="select2 form-select" id="select2-disabled-result">
                                    <option value="" label="Add project members by name or email..."></option>
                                    <option value="2">Option2</option>
                                    <option value="3">Option3</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <label class="form-label" for="basicInput">Keahlian/Bidang Keahlian</label>
                                <input type="text" class="form-control" id="basicInput"
                                    placeholder="Masukan Keahlian" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
@endsection
@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection

