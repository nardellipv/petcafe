@extends('layouts.mainAdminSite')

@section ('css')
@endsection

@section('content')
<div class="page-content">
    <div class="card border-top border-0 border-4 border-info">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                    </div>
                    <h5 class="mb-0 text-info">Agregar Proveedor</h5>
                </div>
                @include('web.alerts.error')
                <hr />
                <form method="POST" action="{{ route('upgrade.provider') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName" name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre Proveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Teléfono Principal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" name="phone" value="{{ old('phone') }}" placeholder="Ingrese teléfono principal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo3" class="col-sm-3 col-form-label">Teléfono Secundario</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo3" name="phone2" value="{{ old('phone2') }}" placeholder="Ingrese teléfono secundario">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmailAddress2" name="email" value="{{ old('email') }}" placeholder="Email Proveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Dirección</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" name="address" placeholder="Dirección Proveedor">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Comentario</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" name="comment" placeholder="Comentarios sobre el proveedor">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Agregar Proveedor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection