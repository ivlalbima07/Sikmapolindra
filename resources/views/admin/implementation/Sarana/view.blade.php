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
                                            <td class="fw-bolder p-2">Jenis</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->jenis }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Nama Alat</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->nama_alat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Spesifikasi</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->spesifikasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Jumlah</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->jumlah }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Mulai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->tanggal_mulai }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder p-2">Tanggal Selesai</td>
                                            <td class="p-2">:</td>
                                            <td class="p-2">{{ $item->tanggal_selesai }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya dari Dunia Kerja</td>
                                            <td>:</td>
                                            <td>{{ $item->nominal_biaya_dunia_kerja }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya dari Satuan Pendidikan</td>
                                            <td>:</td>
                                            <td>{{ $item->nominal_biaya_satuan_pendidikan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya dari Pemerintah Daerah</td>
                                            <td>:</td>
                                            <td>{{ $item->nominal_biaya_pemerintah_daerah }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya dari Pemerintah Pusat</td>
                                            <td>:</td>
                                            <td>{{ $item->nominal_biaya_pemerintah_pusat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bolder">Nominal Biaya dari DUDI</td>
                                            <td>:</td>
                                            <td>{{ $item->nominal_biaya_dudi }}</td>
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
                            <a class="nav-link col" id="contact-tab" data-bs-toggle="pill" href="#PenanggungJawab" aria-expanded="false">Penanggung Jawab</a>
                        </li>
                    </ul>
                    <div class="card-body container">
                        <div class="tab-content">
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
                                        @foreach($item->penanggungJawab as $penanggungJawab)
                                        {{-- @dd($item->penanggungJawab); --}}
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
