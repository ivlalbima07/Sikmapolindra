@extends('layouts.header')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Invoice /</span>INSTRUKTUR/PENDAMPING DUDI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NO.DOKUMEN</th>
                            <th>NIB</th>
                            <th>NAMA DUDI/MITRA</th>
                            <th>PROGRAM STUDI</th>
                            <th>Isi Pelaksanaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">PT. AIR DAN UDARA INDONESIA</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">
                                <div>
                                    <button type="button" onclick="location.href='/isiSarana'"
                                        class="btn btn-success btn-sm"><i data-feather='book'></i>Isi Pelaksanaan</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="align-top">1</th>
                            <td class=" align-top">Gusniawan Amd</td>
                            <td class="align-top">1688105783</td>
                            <td class="align-top">PT. AIR DAN UDARA INDONESIA</td>
                            <td class="align-top">D3 - Teknik Pendingin dan Tata Udara</td>
                            <td class="align-top">
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#defaultSize"><i data-feather='book'></i>Unggah
                                        pks</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{-- modal upload pks --}}
    <div class="modal fade text-start" id="defaultSize" tabindex="-1" aria-labelledby="myModalLabel18" data-bs-backdrop="static" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
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
