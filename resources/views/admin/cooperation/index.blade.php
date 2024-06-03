@extends('admin.app')
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
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="document"><i data-feather='file'></i></button>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="update data nota kesapakatan">
                                        <i data-feather='folder'></i></button>
                                </div>
                                <BR></BR>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Tambah Data"><i
                                            data-feather='plus-circle'></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Hapus Data"><i data-feather='trash-2'></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Data Perusahaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="d-flex justify-content-center px-5">
                        <div class="col mb-1">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Button on right"
                                    aria-describedby="button-addon2" />
                                <button class="btn btn-outline-primary" id="button-addon2" type="button">Go</button>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center">

                        <span class="text-center">
                            <a href="">Klik untuk melihat Referensi Data Integrasi</a>
                        </span>
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
