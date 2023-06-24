@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">
    <div class="card border-top border-0 border-4 border-info">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                    </div>
                    <h5 class="mb-0 text-info">Agregar Vendedor</h5>
                </div>
                @include('web.alerts.error')
                <hr />
                <form method="POST" action="{{ route('upgrade.employee') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nombre y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName" name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre Cliente">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" name="phone" value="{{ old('phone') }}" placeholder="Ingrese teléfono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmailAddress2" name="email" value="{{ old('email') }}" placeholder="Email Cliente">
                        </div>
                    </div>
                    <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tipo</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Owner">
                        <label class="form-check-label" for="inlineRadio1">Dueño</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Employee">
                        <label class="form-check-label" for="inlineRadio2">Vendedor</label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputToken" class="col-sm-3 col-form-label">PIN <small>(4 dígitos)</small></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" maxlength="4" id="inputToken" name="token" value="{{ old('token') }}" placeholder="Ingrese un PIN de 4 dígitos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Dirección</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" name="address" placeholder="Dirección Cliente">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Agregar Vendedor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection