@extends('admin.app')
@section('content')
    <div class="card p-2">
        <h4>
            Klasifikasi Baku Lapangan Usaha (KBLI)
        </h4>
        <div class="d-flex justify-content-end"> <button class="btn btn-success rounded-pill " data-bs-toggle="modal"
                data-bs-target="#KBLI" type="submit"><i class="bx bx-plus-circle"></i>
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
                        <th class="text-center">#</th>
                        <th>Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center align-top">1</th>
                        <td class=" align-top">Gusniawan Amd</td>
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


    <!-- Modal KBLI -->
    <div class="modal fade" id="KBLI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Klasifikasi Baku Lapangan Usaha (KBLI)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mt-1">
                        <label class="form-label" for="basicInput">Nama</label>
                        <input type="text" class="form-control" id="basicInput" placeholder="Masukan Nama" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable();
        });
    </script>
@endsection
