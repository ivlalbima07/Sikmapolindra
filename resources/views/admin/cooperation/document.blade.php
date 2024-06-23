@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>DATA DUDI INTEGRASI</h4>

        <!-- Invoice List Table -->
        <div class="card p-2">
            <div class="card">
            </div>
            <div class="card-datatables table-responsive">
                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tgl. Penempatan</th>
                            <th>Tgl. Mulai</th>
                            <th>Tgl. Selesai</th>
                            <th>Status</th>
                            <th>Dokumen</th>
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
                            <td class="align-top">request</td>
                            <td class="align-top">
                                <div>
                                    <button type="button" onclick="location.href=''" class="btn btn-success btn-sm"><i
                                            data-feather='book'></i>Isi Pelaksanaan</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
