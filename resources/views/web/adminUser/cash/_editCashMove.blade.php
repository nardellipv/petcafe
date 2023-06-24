@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">
    @include('web.alerts.error')
    <div class="row">

        <form class="row g-2" action="{{ route('moveMoneyUpgrade.cash', $cash) }}" method="POST">
            @csrf
            <div class="col-12 col-lg-6">
                <h6 class="mb-0 text-uppercase">Editar Movimientos</h6>
                <hr />
                <div class="card-body">
                    <div class="input-group mb-2"> <span class="input-group-text">$</span>
                        <input type="text" name="mount" value="{{ $cash->mount, old('mount') }}" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </button>
                    </div>
                    @foreach($paymentShop as $payment)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment_id" id="{{ $payment->payment_id }}" value="{{ $payment->payment_id }}">
                        <label class="form-check-label" for="{{ $payment->payment_id }}">{{ $payment->name }}</label>
                    </div>
                    @endforeach
                    <div class="input-group mb-2">
                        <textarea class="form-control" name="comment" id="inputAddress" placeholder="Motivo de la salida de dinero" rows="3">{{ $cash->comment, old('comment') }}</textarea>
                    </div>
                    <div class="input-group mb-2">
                        <select class="form-select mb-3" aria-label="Default select example" name="employee_id">
                            <option value="{{ $cash->employee_id }}"> {{ $cash->employee->name   }}</option>
                            <option disabled>---------------</option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="type" value="1" class="btn btn-success px-5"><i class='bx bx-upload mr-1'></i>Ingresar Dinero</button>
                        <button type="submit" name="type" value="0" class="btn btn-danger px-5"><i class='bx bx-download mr-1'></i>Extraer Dinero</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection