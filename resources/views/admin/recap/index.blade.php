@extends('layouts.header')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h3 class="content-header-title float-start mb-0">SIKERMA | </span> Rekap Pelaksanaan Kerjasama</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                @foreach($data as $kerjasama)
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card p-3">
                            <h4 style="text-align:center">{{ $kerjasama['jenis_kerjasama'] }}</h4>
                            <hr>
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
                                                <td>1</td>
                                                <td>Berapa Jumlah Mitra/DUDI Kerjasama?</td>
                                                <td>{{ $kerjasama['jumlah_mitra_dudi'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Berapa Jumlah Program Studi Kerjasama?</td>
                                                <td>{{ $kerjasama['jumlah_program_studi'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Borderless Table -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
    
    @endsection