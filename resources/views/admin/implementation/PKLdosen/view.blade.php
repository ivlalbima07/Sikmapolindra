@extends('layouts.header')
@section('content')
    <div class="card-body">
        <section class="invoice-preview-wrapper">
            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="">
                    <div class="card invoice-preview-card">
                        <div class="card-body invoice-padding pb-0">
                            <!-- Header starts -->
                            <div class="row g-3 invoice-spacing">
                                <div class="col">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bolder">Nama Dosen</td>
                                                <td>:</td>
                                                <td>{{ $pkldosen->nama_rombel }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Tanggal Mulai</td>
                                                <td>:</td>
                                                <td>{{ $pkldosen->tanggal_mulai }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Tanggal Selesai</td>
                                                <td>:</td>
                                                <td>{{ $pkldosen->tanggal_selesai }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Dokumen</td>
                                                <td>:</td>
                                                <td>
                                                    @if($pkldosen->file)
                                                        <a href="{{ asset('uploads/' . $pkldosen->file) }}" target="_blank">Lihat Dokumen</a>
                                                    @else
                                                        Tidak ada dokumen
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Header ends -->
                        </div>

                        <hr class="invoice-spacing" />
                        <h4 class="text-center">Data Penanggung Jawab</h4>
                        <hr class="invoice-spacing" />

                        <ul class="nav nav-pills d-flex justify-content-around">
                            <li class="nav-item row" style="height: 50%">
                                <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Dosen" aria-expanded="true">Dosen</a>
                            </li>
                            <li class="nav-item nav-pill-success row">
                                <a class="nav-link nav-pill-secondary col" id="profile-tab" data-bs-toggle="pill" href="#Instruktur" aria-expanded="false">Instruktur</a>
                            </li>
                            <li class="nav-item row">
                                <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#PenanggungJawab" aria-expanded="false">Penanggung Jawab</a>
                            </li>
                        </ul>
                        <div class="card body container">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="Dosen" aria-labelledby="home-tab" aria-expanded="true">
                                    <div class="card-datatables table-responsive">
                                        <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nama</th>
                                                    <th>NIDN</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pkldosen->dosen as $dosen)
                                                    <tr>
                                                        <th class="align-top">{{ $loop->iteration }}</th>
                                                        <td class="align-top">{{ $dosen->nama }}</td>
                                                        <td class="align-top">{{ $dosen->nidn }}</td>
                                                        <td class="align-top">{{ $dosen->tempat_lahir }}</td>
                                                        <td class="align-top">{{ $dosen->tanggal_lahir }}</td>
                                                        <td class="align-top">{{ $dosen->jenis_kelamin }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Instruktur" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                                    <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>No.ID</th>
                                                <th>Jabatan</th>
                                                <th>No. Telepon</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pkldosen->instruktur as $instruktur)
                                                <tr>
                                                    <th class="align-top">{{ $loop->iteration }}</th>
                                                    <td class="align-top">{{ $instruktur->nama }}</td>
                                                    <td class="align-top">{{ $instruktur->no_id }}</td>
                                                    <td class="align-top">{{ $instruktur->jabatan }}</td>
                                                    <td class="align-top">{{ $instruktur->no_telepon }}</td>
                                                    <td class="align-top">{{ $instruktur->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="PenanggungJawab" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">
                                    <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>NIDN</th>
                                                <th>Prodi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pkldosen->penanggungJawab as $pj)
                                                <tr>
                                                    <th class="align-top">{{ $loop->iteration }}</th>
                                                    <td class="align-top">{{ $pj->nama }}</td>
                                                    <td class="align-top">{{ $pj->nidn }}</td>
                                                    <td class="align-top">{{ $pj->prodi }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Invoice -->
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script>
    $(function() {
        const table = $('.datatables').DataTable();
    });
</script>
@endsection
