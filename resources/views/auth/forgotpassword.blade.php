@extends('layouts.auth')
@section('content')
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
                                    class="img-fluid" src="../../../app-assets/images/pages/forgot-password-v2.svg"
                                    alt="Forgot password V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Forgot password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your
                                    password</p>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="forgot-password-email">Email</label>
                                        <input class="form-control"type="text"
                                        value="{{ old('email') }}" id="reset-password" name="email" placeholder="Email" 
                                            aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span> <!-- Tambahkan class text-danger untuk warna merah -->
                                    @enderror
                                    <button class="btn btn-primary w-100 mb-1" tabindex="2">Send reset link</button>
                                </form>
                                <p class="text-center mt-2"><a href="{{ route('loginForm') }}"><i data-feather="chevron-left"></i> Back to
                                        login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
