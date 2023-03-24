<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="color-sidebar sidebarcolor5 color-header headercolor8">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/admin/images/favicon-32x32.png') }}" type="image/png"/>
    <!--plugins-->
    <link href="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
    <!-- loader-->
    @yield('css')
    <link href="{{ asset('assets/admin/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/admin/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/admin/css/dark-theme.css') }}"/> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/admin/css/semi-dark.css') }}"/> -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/header-colors.css') }}"/>
    <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{ asset('assets/admin/images/logoBolsa.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Pet Cafe</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <!--navigation-->
        @include('web.adminUser.parts._menu')
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        @include('web.adminUser.parts._header')
    </header>

    <div class="page-wrapper">
        @include('sweetalert::alert')
        @yield('content')
    </div>

    <footer class="page-footer">
        <p class="mb-0">Copyright © {{ date('Y') }}. All right reserved. <a href="https://mikant.com.ar" target="_blank">MikAnt</a> </p>
    </footer>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('assets/admin/plugins/simplebar/js/simplebar.min.js') }}"></script> -->
<script src="{{ asset('assets/admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<!-- <script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script> -->
<!-- <script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script> -->
<!-- <script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.min.js') }}"></script> -->
<!-- <script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.extension.js') }}"></script> -->
<script src="{{ asset('assets/admin/js/index.js') }}"></script>
@yield('js')
<!--app JS-->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
</body>

</html>
