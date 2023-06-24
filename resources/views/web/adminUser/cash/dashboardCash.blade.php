@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Ingresos del Día</p>
                            <h4 class="my-1">$ {{ $totalIn  }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-success text-primary ms-auto"><i class="bx bxs-plus-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Egresos del Día</p>
                            <h4 class="my-1">$ {{ $totalOut  }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-warning ms-auto"><i class='bx bxs-minus-circle'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Día <b>{{ date('d/m/Y') }}</b></p>
                            <h4 class="my-1">$ {{ $totalIn - $totalOut }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-wallet'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('web.alerts.error')
    <div class="row">

        @if($paymentShop->isEmpty())
        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-dark">Seleccionar un ingreso de dinero</h6>
                    <div class="text-dark">Por favor seleccione un ingreso de dinero valido <i>ej. Efectivo</i>. Ir a <a href="{{ route('shop.edit') }}"> Perfíl Tienda</a></div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form class="row g-2" action="{{ route('moveMoney.cash') }}" method="POST">
            @csrf
            <div class="col-12 col-lg-5 shadow-none p-4 rounded">
                <div class="card-body">
                    <div class="input-group mb-2"> <span class="input-group-text">$</span>
                        @if($paymentShop->isEmpty())
                        <input type="text" name="mount" value="{{ old('mount') }}" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                        @else
                        <input type="text" name="mount" value="{{ old('mount') }}" class="form-control" aria-label="Amount (to the nearest dollar)">
                        @endif
                    </div>
                    @foreach($paymentShop as $payment)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment_id" id="{{ $payment->payment_id }}" value="{{ $payment->payment_id }}">
                        <label class="form-check-label" for="{{ $payment->payment_id }}">{{ $payment->name }}</label>
                    </div>
                    @endforeach
                    <div class="input-group mb-2">
                        <textarea class="form-control" name="comment" id="inputAddress" placeholder="Motivo del movimiento de dinero" rows="3">{{ old('comment') }}</textarea>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="type" value="1" class="btn btn-success px-1"><i class='bx bx-upload mr-1'></i>Ingresar Dinero</button>
                        <button type="submit" name="type" value="0" class="btn btn-danger px-1"><i class='bx bx-download mr-1'></i>Extraer Dinero</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 shadow-none p-2 rounded">
                <div id="chart8"></div>
            </div>

        </form>
    </div>
    <br>
    <h6 class="mb-0 text-uppercase">Movimientos Diarios</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Monto</th>
                            <th>Motivo</th>
                            <th>Metodo</th>
                            <th>Hora</th>
                            <th>Vendedor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cashesDiary as $key=>$cash)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text text-center">
                                @if($cash->type == 1)
                                <i class="lni lni-circle-plus text text-primary"></i>
                                @else
                                <i class="lni lni-circle-minus text text-danger"></i>
                                @endif
                            </td>
                            <td>$ {{ $cash->mount }}</td>
                            <td>{{ $cash->comment }}</td>
                            <td>{{ $cash->payment->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($cash->updated_at)->format('H:i') }} hs.</td>
                            <td>{{ $cash->employee->name }}</td>
                            <td>
                                <div class="col">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('moveMoneyEdit.cash', $cash) }}" type="button" class="btn btn-outline-primary {{ ($employeeIsOnline->type == 'Owner') ? "" : "disabled" }}""><i class="bx bx-edit-alt"></i></a>
                                        <a href="{{ route('moveMoneyDelete.cash', $cash) }}" type="button" class="btn btn-outline-danger {{ ($employeeIsOnline->type == 'Owner') ? "" : "disabled" }}""><i class="bx bx-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">Entrada/Salida por Metodo</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div id="chart5"></div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>


<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function() {
        "use strict";

        // chart 8
        var options = {
            series: [{{ $totalIn }},{{ $totalOut }}],
            chart: {
                foreColor: '#9ba7b2',
                height: 330,
                type: 'pie',
            },
            colors: ["#0d6efd", "#ffc107"],
            labels: ['Ingreso', 'Egreso'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 360
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#chart8"), options);
        chart.render();


        // chart 5
        var options = {
            series: [{
                data: [
                    @foreach($cashesDiaryChart as $cash) 
                            {{ $cash->mount }},
                    @endforeach
                ]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 350
            },
            colors: ["#0d6efd"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: [
                    @foreach($cashesDiaryChart as $cash)
                    '{{ $cash->payment->name }}',
                    @endforeach
                ],
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();
    });
</script>
<script src="{{ asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
@endsection