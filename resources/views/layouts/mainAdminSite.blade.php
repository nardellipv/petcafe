<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Page Title -->
    <title>Admin - PetShop</title>
 
    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
 
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/admin/img/favicon.png">
 
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    
    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
    
    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/apex/apexcharts.css') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
 
    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- ======= END MAIN STYLES ======= -->
</head>
<body>

    <!-- Offcanval Overlay -->
    <div class="offcanvas-overlay"></div>
    <!-- Offcanval Overlay -->
 
    <!-- Wrapper -->
    <div class="wrapper">
 
       <!-- Header -->
       <header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
          <!-- Logo -->
          <div class="logo">
             <a href="index.html" class="default-logo"><img src="{{ asset('assets/admin/img/logo.png') }}" alt=""></a>
             <a href="index.html" class="mobile-logo"><img src="{{ asset('assets/admin/img/mobile-logo.png') }}" alt=""></a>
          </div>
          <!-- End Logo -->

          <!-- Main Header -->
          @include('web.adminUser.parts._header')
          <!-- End Main Header -->
       </header>
       <!-- End Header -->
 
       <!-- Main Wrapper -->
       <div class="main-wrapper">
          <!-- Sidebar -->
          @include('web.adminUser.parts._menu')
          <!-- End Sidebar -->
 
          <!-- Main Content -->
          @yield('content')
          <!-- End Main Content -->
       </div>
       <!-- End Main Wrapper -->
 
       
       <!-- Footer -->
       <footer class="footer">
          Dashmin © {{ date('y') }} created by <a href="https://mikant.com.ar/"> MikAnt</a>
       </footer>
       <!-- End Footer -->
    </div>
    <!-- End wrapper -->
 
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
 
    <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
    <script src="{{ asset('assets/admin/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/apex/custom-apexcharts.js') }}"></script>
    <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
 </body>
</html>
