@extends('layouts.auth')
@section('content')
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
                                    class="img-fluid" src="../../../app-assets/images/pages/reset-password-v2.svg"
                                    alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Reset password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Reset Password 🔒</h2>
                                <p class="card-text mb-2">Kata sandi baru Anda harus berbeda dari kata sandi yang digunakan sebelumnya</p>
                                <form class="auth-reset-password-form mt-2" action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="reset-password-new">kata sandi baru</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="reset-password-new"
                                                type="password" name="password" placeholder="New password" value="{{ old('password') }}" required
                                                aria-describedby="reset-password-new" autofocus="" tabindex="1" /><span
                                                class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="reset-password-confirm">Konfirmasi kata sandi</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge"
                                                type="password" id="reset-confirmpassword" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}" required
                                                aria-describedby="reset-password-confirm" tabindex="2" /><span
                                                class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="3">Tetapkan Kata Sandi Baru</button>
                                </form>
                                <p class="text-center mt-2"><a href="{{ route('loginForm') }}"><i
                                            data-feather="chevron-left"></i> Kembali untuk masuk</a></p>
                            </div>
                        </div>
                        <!-- /Reset password-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
