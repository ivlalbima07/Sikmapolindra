@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span> OPERATOR SATUAN PENDIDIKAN</h4>
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">

                <div class="card-datatable table-responsive p-3">
                    <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill "
                            data-bs-toggle="modal" data-bs-target="#basicModal" type="submit"><i
                                class="bx bx-plus-circle"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg> Tambah
                        </button> </div>

                    <!-- Modal -->
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Form Tambah Operator Akun Satuan
                                        Pendidikan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameBasic" class="form-label">Name</label>
                                            <input type="text" id="nameBasic" class="form-control"
                                                placeholder="Enter Name" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label">Email</label>
                                            <input type="email" id="emailBasic" class="form-control"
                                                placeholder="xxxx@xxx.xx" />
                                        </div>
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label">No Telefon</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">US (+1)</span>
                                                <input type="text" class="form-control phone-number-mask"
                                                    placeholder="1 234 567 8900" id="phone-number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <div class="form-password-toggle">
                                                <label class="form-label" for="multicol-password">Password</label>
                                                <div class="input-group input-group-merge form-password-toggle mb-2">
                                                    <input type="password" class="form-control" id="basic-default-password1"
                                                        placeholder="Your Password"
                                                        aria-describedby="basic-default-password1" />
                                                    <span class="input-group-text cursor-pointer"><i
                                                            data-feather="eye"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-0">
                                            <div class="form-password-toggle">
                                                <label class="form-label" for="multicol-confirm-password">Confirm
                                                    Password</label>
                                                <div class="input-group input-group-merge form-password-toggle mb-2">
                                                    <input type="password" class="form-control" id="basic-default-password1"
                                                        placeholder="Your Password"
                                                        aria-describedby="basic-default-password1" />
                                                    <span class="input-group-text cursor-pointer"><i
                                                            data-feather="eye"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <label class="my-1" for="">Akses :</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tambah Kerjasama DUDI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tambah Pendamping/Instruktur dari DUDI
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal -->

                    <table class="datatables datatables-users table border-top">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telefon</th>
                                <th>Aktivitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                                1
                            </td>
                            <td> MINSITAR</td>
                            <td> minsitar12gmail.com</td>
                            <td>12345678</td>
                            <td> <label class="form-check-label mb-50" for="customSwitch13">aktif</label>
                                <div class="form-check form-switch form-check-info">
                                    <input type="checkbox" class="form-check-input" id="customSwitch13" checked />
                                    <label class="form-check-label" for="customSwitch13">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#Modal1"
                                        class="btn btn-primary btn-sm" data-bs-placement="top" title="Update data"
                                        data-bs-toggle="tooltip">
                                        <i data-feather='edit'></i>
                                    </button>
                                    <button type="button" id="confirm-text" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="hapus data"><i
                                            data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Modal Action -->
        <div class="modal fade" id="Modal1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Form Tambah Operator Akun Satuan
                            Pendidikan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Email</label>
                                <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">No Telefon</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control phone-number-mask"
                                        placeholder="1 234 567 8900"  />
                                </div>
                            </div>
                        </div>
                        <label class="my-1" for="">Akses :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tambah Kerjasama DUDI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tambah Pendamping/Instruktur dari DUDI
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal -->

        <div class="content-backdrop fade"></div>
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
