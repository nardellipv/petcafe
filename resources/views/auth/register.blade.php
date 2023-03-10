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

    <script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
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
            <h4 class="text-uppercase font-bold m-b-0">Registrarme</h4>
        </div>
        <div class="p-20">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group ">
                    <div class="mt-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="owner" class="custom-control-input" name="typeUser" value="Owner">
                            <label class="custom-control-label" for="owner">Dueño</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="client" name="typeUser" class="custom-control-input" value="Client">
                            <label class="custom-control-label" for="client">Cliente</label>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               placeholder="Nombre y Apellido"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="email" id="email" class="form-control" name="email"
                               placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control" id="exampleSelect1" name="province_id">
                            <option value="2">Ciudad Autónoma de Buenos Aires</option>
                            <option value="6">Buenos Aires</option>
                            <option value="10">Catamarca</option>
                            <option value="14">Córdoba</option>
                            <option value="22">Chaco</option>
                            <option value="26">Chubut</option>
                            <option value="18">Corrientes</option>
                            <option value="30">Entre ríos</option>
                            <option value="34">Formosa</option>
                            <option value="38">Jujuy</option>
                            <option value="42">La Pampa</option>
                            <option value="46">La Rioja</option>
                            <option value="50">Mendoza</option>
                            <option value="54">Misiones</option>
                            <option value="58">Neuquén</option>
                            <option value="62">Río negro</option>
                            <option value="66">Salta</option>
                            <option value="70">San Juan</option>
                            <option value="74">San Luis</option>
                            <option value="78">Santa Cruz</option>
                            <option value="82">Santa Fe</option>
                            <option value="86">Santiago del Estero</option>
                            <option value="90">Tucumán</option>
                            <option value="94">Tierra del Fuego</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password" placeholder="Ingresar Password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Repetir Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-custom">
                            <input id="checkbox-signup" type="checkbox" checked="checked">
                            <label for="checkbox-signup">Acepto <a href="extra-register.html#">Términos y
                                    Condiciones</a></label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-bordred btn-block waves-effect waves-light" type="submit">
                            Registrarme
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- end card-box -->

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Ya poseo una cuenta<a
                    href="{{ route('login') }}" class="text-info m-l-5"><b>Ingresar</b></a></p>
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
