@extends('layouts.header')
@section('content')
    <style>
        .dropdown-item:focus,
        .dropdown-item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #06424e !important;
        }

        .card .card-cstm {
            background: #6aabf4;
            padding: 10px;
            border-radius: 10px !important;
            -webkit-border-radius: 10px !important;
            -moz-border-radius: 10px !important;
            -ms-border-radius: 10px !important;
            -o-border-radius: 10px !important;
        }

        .card .card-cstm1 {
            background: #4be786;
            padding: 10px;
            border-radius: 10px !important;
            -webkit-border-radius: 10px !important;
            -moz-border-radius: 10px !important;
            -ms-border-radius: 10px !important;
            -o-border-radius: 10px !important;
        }

        .card .card-cstm2 {
            background: #f46a6a;
            padding: 10px;
            border-radius: 10px !important;
            -webkit-border-radius: 10px !important;
            -moz-border-radius: 10px !important;
            -ms-border-radius: 10px !important;
            -o-border-radius: 10px !important;
        }

        .simplebar-content-wrapper {
            background: linear-gradient(180deg, hsl(198.17deg 80.16% 35.64%) 0%, hsl(206.46deg 79.56% 39.87%) 0%, hsl(165.55deg 82.65% 52.32% / 60%) 100%);
        }

        .shadow-cstm {
            border-radius: 15px !important;
            box-shadow: 2px 2px 15px #888888 !important;
        }

        .wrap-card {
            padding: 10px;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .card.cust {
            border-radius: 15px;
            min-height: 330px;
        }

        .course-feature {
            /* -webkit-transform: scale(1.08);
                        transform: scale(1.08); */
            -webkit-transform: unset;
            transform: unset;
        }

        .isikonten {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: 0.5s ease;
            background-size: cover !important;
            background-position: center bottom !important;
            -webkit-transition: 0.5s ease;
            -moz-transition: 0.5s ease;
            -ms-transition: 0.5s ease;
            -o-transition: 0.5s ease;
        }

        .text-isi {
            width: 80%;
            color: white;
            font-size: 16px;
            position: absolute;
            line-height: 20px;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .card.cust .isikonten {
            height: 100%;
        }

        .overlay-dark-2 {
            background: linear-gradient(0deg, #0d526c 0%, #0a1827a6 100%);
            width: 100%;
            height: 100%;
            position: absolute;
            /* backdrop-filter: blur(4px); */
        }
    </style>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold  mb-4">SIKMA | PELAKSANAAN KERJASAMA</h4>
            <div class="row">

                <div class="col-xl-3 col-sm-6" data-filter-item
                    data-filter-name="tenaga pendidik/tenaga ahli dari dunia kerja&lt;br&gt;(tenaga pendidik tamu)">
                    <div class="wrap-card">
                        <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                            <div class="isikonten"
                                style="background: url('app-assets/images/illustrasi/guru-dosen-tenaga-ahli-dari-dunia-kerja-min.png');">
                                <div class="overlay-dark-2"></div>
                                <div class="text-isi">
                                    <div class="text-white">Dosen/Tenaga Ahli dari Dunia Kerja<br>(Dosen Tamu)</div>
                                    <a type="button" href="/DosenTamu" class="btn btn-sm btn-light mt-2"> Isi Pelaksanaan <i
                                            class="bx bx-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item
                    data-filter-name="praktek kerja lapangan (pkl) peserta didik">
                    <div class="wrap-card">
                        <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                            <div class="isikonten"
                                style="background: url('app-assets/images/illustrasi/praktek-kerja-lapangan-(pkl)-peserta-didik-min.png');">
                                <div class="overlay-dark-2"></div>
                                <div class="text-isi">
                                    <div class="text-white">Praktek Kerja Lapangan (PKL) Mahasiswa</div>
                                    <a type="button" href="/Pkl_mhs" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                            class="bx bx-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item
                    data-filter-name="praktek kerja lapangan (pkl) tenaga pendidik">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/praktek-kerja-lapangan-(pkl)-tenaga-pendidik-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Praktek Kerja Lapangan (PKL) Dosen</div>
                                        <a type="button" href="/Pkl_Dosen" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="sertifikasi kompetensi">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/sertifikasi-kompetensi-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Sertifikasi Kompetensi</div>
                                        <a type="button" href="/sertifikasi" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="riset terapan">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/riset-terapan-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Riset Terapan</div>
                                        <a type="button" href="/RisetTerapan" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="penyerapan lulusan">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/penyerapan-lulusan-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Penyerapan Lulusan</div>
                                        <a type="button" href="/Penyerapan" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="beasiswa/ikatan dinas">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/beasiswa-ikatan-dinas-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Beasiswa/Ikatan Dinas</div>
                                        <a type="button" href="/beasiswa" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="sarana">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/sarana-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Sarana</div>
                                        <a type="button" href="/Sarana" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="&lt;i&gt;joint research&lt;/i&gt;">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/join-research-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white"><i>Joint Research</i></div>
                                        <a type="button" href="/JoinResearch" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="col-xl-3 col-sm-6" data-filter-item data-filter-name="pelatihan kepada dunia kerja">
                        <div class="wrap-card">
                            <div class="card cust border-0 text-center course-feature p-4 overflow-hidden shadow">
                                <div class="isikonten"
                                    style="background: url('app-assets/images/illustrasi/praktek-kerja-lapangan-(pkl)-tenaga-pendidik-min.png');">
                                    <div class="overlay-dark-2"></div>
                                    <div class="text-isi">
                                        <div class="text-white">Pelatihan Kepada dunia kerja</div>
                                        <a type="button" href="/pelatihan" class="btn btn-sm btn-light mt-2">Isi Pelaksanaan <i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

            </div>
            <script src="../../assets//js/pages-pricing.js"></script>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
