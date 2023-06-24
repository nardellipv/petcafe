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
                            <p class="mb-0 text-secondary">Ingresos Totales</p>
                            <h4 class="my-1 text text-primary">$ {{ $totalIn }}</h4>
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
                            <p class="mb-0 text-secondary">Egresos Totales</p>
                            <h4 class="my-1 text text-danger">$ {{ $totalOut }}</h4>
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
                            <p class="mb-0 text-secondary">Total</b></p>
                            <h4 class="my-1">$ {{ $totalIn + $totalOut }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-wallet'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('filterMoneyHistorical.cash') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-5">
                <h6 class="mb-0 text-uppercase">Movimientos Historicos</h6>
            </div>

            <div class="col-12 col-lg-2">
                <input type="date" name="from" class="form-control">
            </div>
            <div class="col-12 col-lg-2">
                <input type="date" name="to" class="form-control">
            </div>
            <div class="col-12 col-lg-2">
                <div class="col">
                    <button type="submit" class="btn btn-info px-5">Buscar</button>
                </div>
            </div>
    </form>
</div>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example3" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Monto</th>
                        <th>Motivo</th>
                        <th>Metodo</th>
                        <th>Hora</th>
                        <th>Vendedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashesHistorical as $key=>$cash)
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
@endsection

@section('js')
<script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
    $(function() {
        $('#date-time').bootstrapMaterialDatePicker({
            format: 'DD-MM-YYYY'
        });
        $('#date').bootstrapMaterialDatePicker({
            time: false
        });
        $('#time').bootstrapMaterialDatePicker({
            date: false,
            format: 'HH:mm'
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#example3').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function() {
        "use strict";

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