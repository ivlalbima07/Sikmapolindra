@extends('layouts.header')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h3 class="content-header-title float-start mb-0">SIKERMA3 | </span> Rekap Pelaksanaan Kerjasama</h3>
                    <div class="breadcrumb-wrapper">
                        {{-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">recap </li>
                        </ol> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <!-- Monthly Campaign State -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card p-3" >

                        <h4 style="text-align:center"> Sertifikasi Kompetensi </h4>
                        <hr>
                        <!-- Borderless Table -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan<br>Link &amp; Match</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <span> 1 </span> </td>
                                            <td>Berapa Jumlah Mitra/DUDI Kerjasama?</td>
                                            <td> 2</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span> 2 </span>
                                            </td>
                                            <td>Berapa Jumlah Program Studi Kerjasama?</td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Borderless Table -->
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4" >
                    <div class="card p-3">
                        <h4 style="text-align:center"> Sertifikasi Kompetensi </h4>
                        <hr>
                        <!-- Borderless Table -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan<br>Link &amp; Match</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td>Berapa Jumlah Mitra/DUDI Kerjasama?</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td> 1 </td>
                                            <td>Berapa Jumlah Program Studi Kerjasama?</td>
                                            <td>4</span></td>
                                        </tr>
                                        <tr>
                                            <td> 1 </td>
                                            <td>Berapa Jumlah Mata Kuliah yang Terlibat?</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Borderless Table -->
                    </div>
                </div>
                <!--/ Monthly Campaign State -->



            </div>
        </div>
        {{-- <div class="content-body">
        <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body shadow-cstm">
                                <h5 style="text-align:center"> Sertifikasi Kompetensi </h5>
                                <hr>
                                <table class="table table-sm table-bordered table-stripped table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Pertanyaan<br>Link &amp; Match</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Berapa Jumlah Mitra/DUDI Kerjasama?</td>
                                            <td class="text-right">2</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Berapa Jumlah Program Studi Kerjasama?</td>
                                            <td class="text-right">4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body shadow-cstm">
                                <div class="card">
                                    <h5 class="card-header">Bordered Table</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Project</th>
                                                        <th>Client</th>
                                                        <th>Users</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
                                                            <strong>Angular Project</strong>
                                                        </td>
                                                        <td>Albert Cook</td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bordered Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
