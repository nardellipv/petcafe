<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Page Title -->
    <title>PetShop</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.png')}}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- ======= END MAIN STYLES ======= -->

</head>

<body>

    <div class="mn-vh-100 d-flex align-items-center">
        <div class="container">
            <!-- Card -->
            <div class="card justify-content-center auth-card">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <h4 class="mb-5 font-20">Bienvenido a PetShop</h4>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="email" class="mb-2 font-14 bold black">Email</label>
                                <input type="email" class="theme-input-style  @error('email') is-invalid @enderror"
                                               placeholder="Email" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                 <label for="password" class="mb-2 font-14 bold black">Password</label>
                                <input type="password"
                                               class="theme-input-style @error('password') is-invalid @enderror"
                                               placeholder="Password" name="password" required
                                               autocomplete="current-password">
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-between mb-20">
                                <div class="d-flex align-items-center">
                                    <!-- Custom Checkbox -->
                                    <label class="custom-checkbox position-relative mr-2">
                                        <input type="checkbox" id="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- End Custom Checkbox -->

                                    <label for="checkbox" class="font-14">Recordarme</label>
                                </div>

                                <a href="forget-pass.html" class="font-12 text_color">¿Olvide mi contraseña?</a>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn long mr-20">Ingresar</button>
                                <span class="font-12 d-block"><a href="register.html" class="bold">Registrarme</a>, si todavía no tengo cuenta.</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer style--two">
        © {{ date('Y') }} created by <a href="https://mikant.com/"> MikAnt</a>
    </footer>
    <!-- End Footer -->

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
</body>

</html>