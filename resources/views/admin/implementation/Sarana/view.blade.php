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
                                                <td class="fw-bolder p-2">Nama Dosen dari DUDI</td>
                                                <td class="p-2">:</td>
                                                <td class="p-2">{{ $dosenTamu->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder p-2">Tanggal Mulai</td>
                                                <td class="p-2">:</td>
                                                <td class="p-2">{{ $dosenTamu->tanggal_mulai }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder p-2">Tanggal Selesai</td>
                                                <td class="p-2">:</td>
                                                <td class="p-2">{{ $dosenTamu->tanggal_selesai }}</td>
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
                                                <td class="fw-bolder"> Nominal Biaya dari Dunia Kerja</td>
                                                <td>:</td>
                                                <td>{{ $dosenTamu->nominal_biaya_dunia_kerja}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nominal Biaya dari Satuan Pendidikan</td>
                                                <td>:</td>
                                                <td>{{ $dosenTamu->nominal_biaya_satuan_pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nominal Biaya dari Pemerintah Daerah</td>
                                                <td>:</td>
                                                <td>{{ $dosenTamu->nominal_biaya_pemerintah_daerah }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nominal Biaya dari Pemerintah Pusat</td>
                                                <td>:</td>
                                                <td>{{ $dosenTamu->nominal_biaya_pemerintah_pusat }}</td>
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
                                <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa"
                                    aria-expanded="true">Data Pembelajaran</a>
                            </li>
                            <li class="nav-item row">
                                <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#DUDI"
                                    aria-expanded="false">Dosen Penanggung Jawab</a>
                            </li>
                        </ul>
                        <div class="card body container">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="Mahasiswa" aria-labelledby="home-tab"
                                    aria-expanded="true">
                                    <div class="card-datatables table-responsive">
                                        <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Matakuliah</th>
                                                    <th>Jumlah JPL</th>
                                                    <th>Honorarium Per Jam</th>
                                                    <th>Dokumen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dosenTamu->mataKuliah as $mataKuliah)
                                                <tr>
                                                    <th class="align-top">{{ $loop->iteration }}</th>
                                                    <td class="align-top">{{ $mataKuliah->nama }}</td>
                                                    <td class="align-top">{{ $mataKuliah->jumlah_jpl }}</td>
                                                    <td class="align-top">{{ $mataKuliah->honorarium_per_jam }}</td>
                                                    <td class="align-top">
                                                        @if($mataKuliah->foto_dokumen)
                                                        <a href="{{ asset('uploads/' . $mataKuliah->foto_dokumen) }}" class="btn btn-primary btn-sm" target="_blank">
                                                            <i data-feather="file"></i> Lihat Dokumen
                                                        </a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="DUDI" role="tabpanel" aria-labelledby="about-tab"
                                    aria-expanded="false">
                                    <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>Nidn</th>
                                                <th>Prodi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dosenTamu->dosenPenanggungJawab as $dosenPJ)
                                            <tr>
                                                <th class="align-top">{{ $loop->iteration }}</th>
                                                <td class="align-top">{{ $dosenPJ->nama }}</td>
                                                <td class="align-top">{{ $dosenPJ->nidn }}</td>
                                                <td class="align-top">{{ $dosenPJ->prodi }}</td>
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
            const table = $('.datatables').DataTable({});
        });
    </script>
@endsection
