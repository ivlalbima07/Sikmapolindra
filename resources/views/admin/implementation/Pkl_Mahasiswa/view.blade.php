@extends('layouts.header')
@section('content')
<div class="card-body">
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <div class="">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <div class="row g-3 invoice-spacing">
                            <div class="col">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bolder p-2">Nama</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $pklMhs->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Mulai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $pklMhs->tanggal_mulai }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Selesai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $pklMhs->tanggal_selesai }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-1">
                            </div>
                            <div class="col">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bolder">Biaya Per Mahasiswa</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_per_mahasiswa, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Biaya dari Dunia Kerja</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_dunia_kerja, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Biaya dari Satuan Pendidikan</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_satuan_pendidikan, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Biaya dari Pemerintah Daerah</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_pemerintah_daerah, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Biaya dari Pemerintah Pusat</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_pemerintah_pusat, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Biaya Cost Sharing</td>
                                            <td>:</td>
                                            <td>{{ number_format($pklMhs->biaya_cost_sharing, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="invoice-spacing" />
                    <h4 class="text-center">Data Penanggung Jawab</h4>
                    <hr class="invoice-spacing" />
                    <ul class="nav nav-pills d-flex justify-content-around">
                        <li class="nav-item row" style="height: 50%">
                            <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa" aria-expanded="true">Mahasiswa</a>
                        </li>
                        <li class="nav-item row">
                            <a class="nav-link col" id="profile-tab" data-bs-toggle="pill" href="#Dosen" aria-expanded="false">Dosen</a>
                        </li>
                        <li class="nav-item row">
                            <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#Instruktur" aria-expanded="false">Instruktur</a>
                        </li>
                    </ul>
                    <div class="card body container">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="Mahasiswa" aria-labelledby="home-tab" aria-expanded="true">
                                <div class="card-datatables table-responsive">
                                    <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pklMhs->mahasiswa as $mahasiswa)
                                            <tr>
                                                <th class="align-top">{{ $loop->iteration }}</th>
                                                <td class="align-top">{{ $mahasiswa->nama }}</td>
                                                <td class="align-top">{{ $mahasiswa->nim }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="Dosen" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIDN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pklMhs->dosen as $dosen)
                                        <tr>
                                            <th class="align-top">{{ $loop->iteration }}</th>
                                            <td class="align-top">{{ $dosen->nama }}</td>
                                            <td class="align-top">{{ $dosen->nidn }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="Instruktur" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">
                                <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pklMhs->instruktur as $instruktur)
                                        <tr>
                                            <th class="align-top">{{ $loop->iteration }}</th>
                                            <td class="align-top">{{ $instruktur->nama }}</td>
                                            <td class="align-top">{{ $instruktur->jabatan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
