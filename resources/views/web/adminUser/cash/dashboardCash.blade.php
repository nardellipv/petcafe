@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    @include('web.alerts.error')
    <div class="row">
        <form class="row g-2" action="{{ route('moveMoney.cash') }}" method="POST">
            @csrf
            <div class="col-12 col-lg-4 shadow-none p-4 rounded">
                <div class="card-body">
                    <div class="input-group mb-2"> <span class="input-group-text">$</span>
                        <input type="text" name="mount" value="{{ old('mount') }}" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </button>
                    </div>
                    <div class="input-group mb-2">
                        <textarea class="form-control" name="comment" id="inputAddress" placeholder="Motivo de la salida de dinero" rows="3">{{ old('comment') }}</textarea>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="type" value="1" class="btn btn-success px-1"><i class='bx bx-upload mr-1'></i>Ingresar Dinero</button>
                        <button type="submit" name="type" value="0" class="btn btn-danger px-1"><i class='bx bx-download mr-1'></i>Extraer Dinero</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 shadow-none p-4 rounded">
                <p class="text text-primary"><strong>Ingreso:</strong> $ {{ $totalIn  }}</p>
                <p class="text text-danger"><strong>Egreso:</strong> $ {{ $totalOut }}</p>
                <p><strong>Total:</strong> $ {{ $totalIn - $totalOut }}</p>
            </div>

            <div class="col-12 col-lg-5 shadow-none p-2 rounded">
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
                            <th>Monto</th>
                            <th>Motivo</th>
                            <th>Tipo</th>
                            <th>Hora</th>
                            <th>Vendedor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cashesDiary as $key=>$cash)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>$ {{ $cash->mount }}</td>
                            <td>{{ $cash->comment }}</td>
                            <td>
                                @if($cash->type == 1)
                                <p class="text text-primary"> Ingreso de dinero</p>
                                @else
                                <p class="text text-danger">Egreso de dinero</p>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($cash->updated_at)->format('H:s') }} hs.</td>
                            <td>{{ $cash->employee->name }}</td>
                            <td>
                                <div class="col">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('moveMoneyEdit.cash', $cash) }}" type="button" class="btn btn-outline-primary"><i class="bx bx-edit-alt"></i></a>
                                        <a href="{{ route('moveMoneyDelete.cash', $cash) }}" type="button" class="btn btn-outline-danger"><i class="bx bx-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
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
            series: [{{ $totalIn }}, {{ $totalOut }}],
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

    });
</script>
<script src="{{ asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
@endsection