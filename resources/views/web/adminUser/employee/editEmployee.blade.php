@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">
    <div class="card border-top border-0 border-4 border-info">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                    </div>
                    <h5 class="mb-0 text-info">Editar Vendedor</h5>
                </div>
                @include('web.alerts.error')
                <hr />
                <form method="POST" action="{{ route('update.employee', $employee) }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nombre y Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEnterYourName" name="name" value="{{ $employee->name, old('name') }}" placeholder="Ingresar Nombre Cliente">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhoneNo2" name="phone" value="{{ $employee->phone, old('phone') }}" placeholder="Ingrese teléfono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmailAddress2" name="email" value="{{ $employee->email, old('email') }}" placeholder="Email Cliente">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Dirección</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress4" rows="3" name="address" placeholder="Dirección Cliente">{{ $employee->address, old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Actualizar Cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection