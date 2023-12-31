@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ventas del mes</h5>
            <hr />
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Fecha Compra</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->invoice }}</td>
                            <td>
                                @if($sale->client_id == 0)
                                <small class="text-danger"> Sin Cliente</small>
                                @else
                                {{ $sale->client->name }}
                                @endif
                            </td>
                            <td>$ {{ $sale->total }}</td>
                            <td>{{ Carbon\Carbon::parse($sale->created_at)->format('d/m/Y') }}</td>
                            <td><a href="{{ route('showHistory.invoice', $sale->invoice) }}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h6 class="mb-0 text-uppercase">Column Chart</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div id="chart6"></div>
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
        // chart 6
        var options = {
            series: [{
                name: '$',
                type: 'column',
                data: [
                    @foreach($sales as $sale)
                        {{ $sale->total }},
                    @endforeach
                ]
            }],
            chart: {
                foreColor: '#9ba7b2',
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: true
                },
            },
            stroke: {
                width: [0, 4]
            },
            plotOptions: {
                bar: {
                    //horizontal: true,
                    columnWidth: '35%',
                    endingShape: 'rounded'
                }
            },
            colors: ["#0d6efd", "#212529"],
            title: {
                text: 'Ventas Acumuladas'
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [1]
            },
            labels: [
                @foreach($sales as $sale)
                        '{{ $sale->created_at }}',
                    @endforeach
            ],
            xaxis: {
                type: 'datetime'
            },
            yaxis: [{
                title: {
                    text: 'Pesos',
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#chart6"), options);
        chart.render();
    });
</script>
<script src="{{ asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
@endsection