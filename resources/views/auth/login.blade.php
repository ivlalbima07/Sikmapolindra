@extends('layouts.auth')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    <!-- BEGIN: Body-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ asset('app-assets/images/pages/login-v2.svg') }}"
                                    alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <div class="text-center p-3">
                                    <img src="{{ asset('app-assets/images/ico/logo.png') }}" style="width: 30%"
                                        alt="">
                                </div>
                                <h2 class="card-title fw-bold mb-1 text-center">Selamat Datang Di <br> Sikma Polindra 👋</h2>

                                <form class="auth-login-form mt-2" method="POST" action="{{ route('ceklogin') }}">
                                    @csrf
                                    <div class="mb-1">
                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Opps!</strong> {{ session('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email"
                                            placeholder="" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">kata sandi</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password"
                                                name="password" placeholder="············" aria-describedby="password"
                                                tabindex="2" /><span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <p class="text-center mt-2">
                                        <a href="{{ route('forgot-password') }}"><span>Lupa kata sandi?</span></a>
                                    </p>
                                    {{-- <a
                                                href="{{ route('forgot-password') }}"><small>Lupa kata sandi?</small></a> --}}
                                    <button type="submit" class="btn btn-primary w-100" tabindex="4">Masuk</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Body-->
@endsection
