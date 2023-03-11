@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Perfíl Tienda</h6>
            @if($shopProfile->name == NULL)
            <div class="alert alert-danger">
                <strong>¡Perfíl Incompleto!</strong> Por favor complete el perfíl de la tienda
            </div>
            @endif
            @include('web.alerts.error')
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <form class="row g-3" method="POST" action="{{ route('shop.update', $shopProfile) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nombre de la Tienda</label>
                            <input type="text" name="name" placeholder="nombre de la tienda" value="{{ $shopProfile->name, old('name') }}" class="form-control" id="name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="number" name="phone" class="form-control" id="inputEmail4" placeholder="teléfono de contacto" value="{{ $shopProfile->phone, old('phone') }}">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="phoneWsp" type="checkbox" id="phoneWsp" {{ $shopProfile->phoneWsp == 'Y' ? 'checked' : '' }}>
                                    <small class="form-check-label" for="phoneWsp">Permitir mensajes por
                                        Whatsapps</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="formFileSm" class="form-label">Logo Tienda</label>
                            <input class="form-control" id="formFileSm" name="logo" type="file">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Formas de Pago
                                <i class="bx bx-question-mark" data-bs-toggle="tooltip" data-bs-placement="top" title="Para eliminar un método de pago, seleccione todos los aceptados y actualice">
                                </i>
                            </label>
                            <select class="multiple-select" multiple="multiple" name="payment_id[]">
                                @foreach($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>
                            @if(!empty($paymentShop))
                            @foreach ($paymentShop as $paymentSelected)
                            <div class="form-check form-check-inline">
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                <i class="bx bx-credit-card"></i>
                                <label class="form-check-label" for="inlineCheckbox1">{{ $paymentSelected->payment->name }}</label>
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label">Dirección</label>
                            <textarea class="form-control" class="form-control" name="address" id="address" placeholder="dirección de la tienda" required rows="3">{{ $shopProfile->address, old('address') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="col-2 form-label">Localidad</label>
                            <select class="form-select" name="city_id" required>
                                @if($shopProfile->city_id)
                                <option value="{{ $shopProfile->city_id }}">{{ $shopProfile->city->name }}</option>
                                @else
                                <option>Seleccione la localidad</option>
                                @endif
                                <option disabled>----------------</option>
                                @foreach($region as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="about" class="form-label">Sobre la tienda</label>
                            <textarea class="form-control" name="about" placeholder="escribe algo sobre tu tienda" rows="5" required>{{ $shopProfile->about, old('about') }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="nombre de perfíl de facebook" value="{{ $shopProfile->facebook, old('facebook') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input id="instagram" name="instagram" class="form-control" placeholder="nombre perfíl instagram" value="{{ $shopProfile->instagram, old('instagram') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="web" class="form-label">Web</label>
                            <input type="text" name="web" placeholder="dirección web" class="form-control" id="web" value="{{ $shopProfile->web, old('web') }}">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
@endsection