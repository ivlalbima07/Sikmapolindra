@extends('layouts.header')
<style>
    .chart-container {
        width: 100%;
        overflow-x: auto;
    }
    #chart {
        width: 100%;
    }
</style>
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h4 class="content-header-title mb-0">SIKMA | BERANDA</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-statistics px-0">
                <div class="card-header d-block px-2">
                    <h4 class="card-title">Selamat Datang {{ Auth::user()->name ?? '' }}</h4>
                    <span class="card-subtitle text-gray">Informasi Dashboard</span>

                </div>

            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">4,567</h3>
                        <span>Jumlah Item Kerja Sama</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                        <span class="avatar-content">
                            <i data-feather="user-plus" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">19,860</h3>
                        <span>Jumlah Program Studi Kerjasama</span>
                    </div>
                    <div class="avatar bg-light-success p-50">
                        <span class="avatar-content">
                            <i data-feather="user-check" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
        </div>
    </div>
    <div class="row match-height">
    </div>
    <div class="content-body">
        <!-- Basic table -->
        <section id="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">Pendapatan Perbulan ({{ $currentMonth }})</h4>
                            <span class="card-subtitle text-gray">Grafik Kriteria</span>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div id="chart"></div>
                            </div>
                            <div class="pagination-links">
                                {{ $kriteriaData->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Basic table -->
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Jumlah DUDI',
                    data: @json($series)
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    width: '100%'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: @json($categories),
                    labels: {
                        rotate: -45
                    },
                    tickPlacement: 'on'
                },
                yaxis: {
                    title: {
                        text: 'Jumlah DUDI',
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        stops: [50, 0, 100]
                    },
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
    </script>
@endsection
