<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tildi - Responsive Admin Template">
    <meta name="author" content="Agahelp">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <title>Tildi - Responsive Admin Template</title>

    <!-- App css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css"/>

{{--    <script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>--}}
</head>

<body>
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <img alt="Tildi" src="{{ asset('assets/admin/images/logo.png') }}">
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Ingresar</h4>
        </div>
        <div class="p-20">
            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror"
                               placeholder="Email" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password" name="password" required
                               autocomplete="current-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-custom">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Recordarme
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-bordred btn-block waves-effect waves-light" type="submit">
                            Ingresar
                        </button>
                    </div>
                </div>

                {{--<div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="https://www.agahelp.com/tildi/vertical-light/page-recoverpw.html" class="text-muted"><i
                                class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>--}}
            </form>

        </div>
    </div>
    <!-- end card-box-->

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">¿No tienes cuenta? <a
                    href="{{ route('register') }}" class="text-info m-l-5"><b>Registrarme</b></a></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->


<!-- jQuery  -->
{{--<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/detect.js') }}"></script>
<script src="{{ asset('assets/admin/js/fastclick.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('assets/admin/js/waves.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.app.js') }}"></script>--}}

</body>
</html>
