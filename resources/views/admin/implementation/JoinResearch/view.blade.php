@extends('layouts.header')
@section('content')
<div class="card-body">
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <div class="col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-spacing">
                            <div class="col-md-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bolder p-2">Nama Joint Research</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->nama_joint_research }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Mulai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->tanggal_mulai }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Selesai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->tanggal_selesai }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Bidang Riset</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->bidang_riset }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Produk Riset</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->produk_riset }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Dokumen</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $joinResearch->dokumen }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bolder">Sumber Biaya</td>
                                            <td>:</td>
                                            <td>{{ $joinResearch->sumber_biaya }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya Luar Negeri</td>
                                            <td>:</td>
                                            <td>{{ $joinResearch->nominal_biaya_luar_negeri }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya APBN</td>
                                            <td>:</td>
                                            <td>{{ $joinResearch->nominal_biaya_apbn }}</td>
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
                        <li class="nav-item row">
                            <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa" aria-expanded="true">Data Mahasiswa</a>
                        </li>
                        <li class="nav-item row">
                            <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#Dosen" aria-expanded="false">Data Dosen</a>
                        </li>
                        <li class="nav-item row">
                            <a class="nav-link col" id="contact-tab" data-bs-toggle="pill" href="#PenanggungJawab" aria-expanded="false">Penanggung Jawab</a>
                        </li>
                    </ul>
                    <div class="card-body container">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="Mahasiswa" aria-labelledby="home-tab" aria-expanded="true">
                                <div class="card-datatables table-responsive">
                                    <table class="datatables table table-borderless table-striped dt-advanced-search table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($joinResearch->mahasiswa as $mahasiswa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->nim }}</td>
                                                <td>{{ $mahasiswa->tempat_lahir }}</td>
                                                <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                                <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="Dosen" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">
                                <table class="datatables table table-borderless table-striped dt-advanced-search table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIDN</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($joinResearch->dosen as $dosen)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dosen->nama }}</td>
                                            <td>{{ $dosen->nidn }}</td>
                                            <td>{{ $dosen->tempat_lahir }}</td>
                                            <td>{{ $dosen->tanggal_lahir }}</td>
                                            <td>{{ $dosen->jenis_kelamin }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="PenanggungJawab" role="tabpanel" aria-labelledby="contact-tab" aria-expanded="false">
                                <table class="datatables table table-borderless table-striped dt-advanced-search table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIDN</th>
                                            <th>Prodi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($joinResearch->penanggungJawab as $penanggungJawab)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penanggungJawab->nama }}</td>
                                            <td>{{ $penanggungJawab->nidn }}</td>
                                            <td>{{ $penanggungJawab->prodi }}</td>
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
        $('.datatables').DataTable();
    });
</script>
@endsection
