@extends('layouts.header')
@section('content')
    <!-- Reset Password basic -->
    <div class="card mb-0">
        <div class="card-body">


            <h4 class="card-title mb-1">Reset Password 🔒</h4>
            <form class="auth-reset-password-form mt-2" action="auth-login-basic.html" method="POST">
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="reset-password-new">Kata Sandi Lama</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="reset-password-new"
                            name="reset-password-new"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="reset-password-new" tabindex="1" autofocus />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="reset-password-new">Kata Sandi Baru</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="reset-password-new"
                            name="reset-password-new"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="reset-password-new" tabindex="1" autofocus />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="reset-password-confirm">Konfirmasi kata sandi baru</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="reset-password-confirm"
                            name="reset-password-confirm"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="reset-password-confirm" tabindex="2" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="3">Set New Password</button>
            </form>
        </div>
    </div>
    <!-- /Reset Password basic -->
@endsection
