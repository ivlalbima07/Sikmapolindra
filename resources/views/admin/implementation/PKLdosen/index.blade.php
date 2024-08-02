@extends('layouts.header')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span>Prakek Kerja Lapang Dosen</h4>

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
                        @foreach ($datakerjasama as $index => $kerjasama)
                            @foreach ($kerjasama->itemKerjasama as $item)
                                <tr>
                                    <th class="align-top">{{ $index + 1 }}</th>
                                    <td class="align-top">{{ $kerjasama->nomor_pks }}</td>
                                    <td class="align-top">{{ $kerjasama->dudi->nib }}</td>
                                    <td class="align-top">{{ $kerjasama->dudi->nama_perseroan }}</td>
                                    <td class="align-top">{{ $item->jurusan }}</td>
                                    <td class="align-top">
                                        <div>
                                            <button type="button" onclick="location.href='/pkldosen/isiDataTenagaPendidikan/{{ $item->id }}'" class="btn btn-success btn-sm">
                                                <i data-feather='book'></i> Isi Pelaksanaan
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
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
