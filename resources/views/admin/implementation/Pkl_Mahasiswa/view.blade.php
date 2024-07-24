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
                                                <td class="fw-bolder">
                                                    Nama Dosen dari DUDI
                                                </td>
                                                <td>:</td>
                                                <td>MAXXIMA HERSAM SOLUSI</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">
                                                    Tanggal Mulai
                                                </td>
                                                <td>:</td>
                                                <td>NIB</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">
                                                    Tanggal Selesai
                                                </td>
                                                <td>:</td>
                                                <td>20566343</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">
                                                    Tanggal Terbit / SK Pendirian
                                                </td>
                                                <td>:</td>
                                                <td>12 December 2018</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder"> Alamat</td>
                                                <td>:</td>
                                                <td >KOMPLEK REGENCY RUKO NEW
                                                    CARIBBEAN BLOK W6 NO.8, 38/, -
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-1">
                                        <label class="fw-bolder" for="">Klasifikasi Baku Lapangan
                                            Usaha (KBLI):</label>
                                        <table>
                                            <tr>
                                                <td>1.</td>
                                                <td>Perdagangan Besar Mobil Bekas</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Perdagangan Besar Mesin, Peralatan Dan Perlengkapan
                                                    Lainnya</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-1">

                                </div>
                                <div class="col">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bolder">Email MitraNominal Biaya dari Dunia Kerja </td>
                                                <td>:</td>
                                                <td>hr@maxximasolusi.co.id / herisagung@maxximasolusi.co.id
                                                </td>
                                            </tr>
                                            <tr class="mt-2">
                                                <td class="fw-bolder" >Nominal Biaya dari Satuan Pendidikan
                                                </td>
                                                <td>:</td>
                                                <td>082352999200 / 0542-8709047</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nominal Biaya dari Pemerintah Daerah</td>
                                                <td>:</td>
                                                <td>Perusahaan Nasional Berstandar Tinggi</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nominal Biaya dari Pemerintah Pusat </td>
                                                <td>:</td>
                                                <td>Nasional</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder"> Provinsi</td>
                                                <td>:</td>
                                                <td>prov. kalimantan timur</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder"> Kabupaten/Kota</td>
                                                <td>:</td>
                                                <td>Kota Balikpapan</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder"> Kecamatan</td>
                                                <td>:</td>
                                                <td>Kec. Balikpapan timur</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder"> Kelurahan</td>
                                                <td>:</td>
                                                <td>Sepinggan baru</td>
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
                <li class="nav-item row " style="height: 50%">

                    <a class="nav-link active col" id="home-tab" data-bs-toggle="pill" href="#Mahasiswa"
                        aria-expanded="true">Mahasiswa</a>
                </li>
                <li class="nav-item nav-pill-success row">

                    <a class="nav-link nav-pill-secondary col" id="profile-tab" data-bs-toggle="pill" href="#Dosen"
                        aria-expanded="false">Dosen</a>
                </li>
                <li class="nav-item row">

                    <a class="nav-link col" id="about-tab" data-bs-toggle="pill" href="#DUDI"
                        aria-expanded="false">Instruktur</a>
                </li>
            </ul>
            <div class="card body container">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Mahasiswa" aria-labelledby="home-tab" aria-expanded="true">
                        <div class="card-datatables table-responsive">

                            <table class="datatables table table-borderles table-striped dt-advanced-search table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Nim</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-top">1</th>
                                        <td class=" align-top">Gusniawan Amd</td>
                                        <td class="align-top">1688105783</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="Dosen" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">

                        <table class="datatables table table-borderles table-striped dt-advanced-search table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Nim</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="align-top">1</th>
                                    <td class=" align-top">Gusniawan Amd</td>
                                    <td class=" align-top">Teknik Informatika</td>
                                    <td class="align-top">1688105783</td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane" id="DUDI" role="tabpanel" aria-labelledby="about-tab" aria-expanded="false">

                        <table class="datatables table table-borderles table-striped dt-advanced-search table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="align-top">1</th>
                                    <td class=" align-top">Gusniawan Amd</td>
                                    <td class="align-top">1688105783</td>

                                </tr>
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
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection
