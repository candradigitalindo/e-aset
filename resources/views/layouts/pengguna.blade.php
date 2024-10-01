<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/front/logo.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('assets/back/dist/css/app.css') }}" />

    @yield('css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="main">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu d-md-none">
        <div class="mobile-menu-bar">
            <a href="" class="d-flex me-auto">
                <img alt="Rubick Bootstrap HTML Admin Template" class="w-6"
                    src="{{ asset('assets/back/dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler" class="mobile-menu-bar__toggler"> <i
                    data-feather="bar-chart-2" class="w-8 h-8 text-white"></i> </a>
        </div>
        <ul class="mobile-menu-wrapper border-top border-theme-29 dark-border-dark-3 py-5">
            <li>
                <a href="{{ route('pengguna.ubah_password') }}" class="menu {{ request()->is('pengguna-ubahpaswd') ? 'menu--active' : '' }} ">
                    <div class="menu__icon"> <i data-feather="lock"></i> </div>
                    <div class="menu__title"> Ubah Password </div>
                </a>

            </li>
            <li>
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="menu">
                    <div class="menu__icon"> <i data-feather="log-out"></i> </div>
                    <div class="menu__title"> Keluar </div>
                </a>

            </li>
            <li>
                <a href="{{ route('pengguna.dashboard') }}" class="menu {{ request()->is('dashboard*') ? 'menu--active' : '' }} ">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>

            </li>

            <li class="menu__devider my-6"></li>

        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="d-flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6"
                    src="{{ asset('assets/back/dist/images/logo.svg') }}">
                <span class="d-none d-xl-block text-white fs-lg ms-3"> e-<span class="fw-medium">Aset</span> </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{ route('pengguna.ubah_password') }}"
                        class="side-menu {{ request()->is('pengguna-ubahpaswd') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                        <div class="side-menu__title">
                            Ubah Password
                        </div>
                    </a>

                </li>
                <li>
                    <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                        <div class="side-menu__title">
                            Keluar
                        </div>
                    </a>

                </li>
            </ul>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{ route('pengguna.dashboard') }}"
                        class="side-menu {{ request()->is('dashboard*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title">
                            Dashboard
                        </div>
                    </a>

                </li>

            </ul>
            <div class="side-nav__devider my-5"></div>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>
    <div id="logoutModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="fw-medium fs-base me-auto">
                        Keluar Aplikasi ?
                    </h2>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer text-end">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-outline-secondary w-32 me-1">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-primary w-32" type="submit" id="logout">Keluar</button>
                        {{-- <a  href="#" onclick="$('#logout').click()">Keluar</a> --}}
                    </form>
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>


    <!-- BEGIN: JS Assets-->

    <script src="{{ asset('assets/back/dist/js/app.js') }}"></script>
    @yield('js')
    <!-- END: JS Assets-->
</body>

</html>
