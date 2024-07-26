<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description"
            content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        {{-- <meta name="_token" content="{{ csrf_token() }}" /> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? '' }}</title>
          <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/logo.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/logo.png') }}">

        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">
        {{-- <link rel="stylesheet" href="../../app-assets/vendors/fonts/tabler-icons.css" /> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/1.0.1/css/themify-icons.min.css"
            rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/fonts/tabler-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/fonts/flag-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/perfect-scrollbar/perfect-scrollbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/libs/node-waves/node-waves.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/libs/typeahead-js/typeahead.css') }}">
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('app-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('app-assets/vendor/libs/node-waves/node-waves.css') }}" />
        <link rel="stylesheet" href="{{ asset('app-assets/vendor/libs/typeahead-js/typeahead.css') }}" />

        {{-- Summernote CSS link --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        {{-- Summernote CSS link --}}

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
        <style>
            .main-menu.menu-light .navigation>li ul li ul a {
                padding: 10px 15px 10px 30px !important;
            }

            .error {
                color: #ea5455;
                font-weight: 600;
            }

            .preloader {
                display: -ms-flexbox;
                display: flex;
                background-color: #f4f6f9;
                height: 100vh;
                width: 100%;
                transition: height 200ms linear;
                position: fixed;
                left: 0;
                top: 0;
                z-index: 9999;
            }

            .dark-mode .preloader {
                background-color: #454d55 !important;
                color: #fff;
            }

            .animation__wobble {
                -webkit-animation: wobble 1500ms;
                animation: wobble 1500ms;
            }

            .dataTables_processing {
                top: 64px !important;
                z-index: 30000 !important;
            }
        </style>
    </head>

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="">

        <nav
            class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
            <div class="navbar-container d-flex content">
                <div class="bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav d-xl-none">
                        <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                    data-feather="menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav align-items-center ms-auto">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                                data-feather="moon"></i></a></li>
                    <li class="nav-item dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name fw-bolder">{{ ucfirst(Auth::user()->name ?? '') }}</span></span>
                                <div class="px-1">
                                    <i data-feather='settings'></i>
                                </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                            {{-- <a class="dropdown-item" href="{{ routeProfile(Auth::id(), Auth::user()->role ?? '') }}"><i class="me-50" data-feather="user"></i> Profile</a> --}}
                            <a class="dropdown-item" href="/resetpassword"><i clas="me-50" data-feather='key'></i>
                                Ganti kata sandi</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50"
                                    data-feather="log-out"></i> Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto">
                        <a class="navbar-brand" href="/">
                            <span class="brand-logo">
                                <img src="{{ asset('app-assets/images/ico/logo.png') }}" alt="Logo">

                            </span>
                            <h2 class="brand-text">Sikma</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                            data-bs-toggle="collapse"><i
                                class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                data-feather="x"></i><i
                                class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                                data-feather="disc" data-ticon="disc"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    @include('admin.app')
                </ul>
            </div>
        </div>
        {{-- @include('layouts.body') --}}
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                @yield('content')
            </div>
        </div>
        {{-- @include('layouts.footer') --}}
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{ asset('app-assets/preloaders/purple-dual-ring-loader.gif') }}" height="100"
                width="100">
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- Summernote JS link --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        {{-- Summernote JS link --}}

        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>

        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/charts/chart-apex.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

        <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('app-assets/js/core/app.js') }}"></script>

        <script src="../../../app-assets/js/scripts/forms/form-repeater.js"></script>
        <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
        {{-- <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script> --}}
        <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
        <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>


        <!-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> -->
        <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-checkout.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="{{ asset('app-assets/js/custom.js') }}"></script>
        <script src="{{ asset('app-assets/js/socketio.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
                const SELECTOR_PRELOADER = '.preloader'
                const $preloader = $(SELECTOR_PRELOADER)
                if ($preloader) {
                    $preloader.css('height', 0)
                    $preloader.children().hide()
                }
            })
            $(".alert-success, .alert-danger, .alert-info").fadeTo(3000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            })
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            })
            CKEDITOR.replaceAll('editor', {
                height: 400,
            });
            $(document).ready(function() {
                $("#summernote").summernote();
                $('.dropdown-toggle').dropdown();
            })
        </script>

        @yield('scripts')
    </body>

</html>
