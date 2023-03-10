@extends('layouts.mainAdminSite')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
@include('web.alerts.error')
@include('web.adminUser.parts._widget')
@include('web.adminUser.parts._clientList')
@include('web.adminUser.parts._addClientDashboard')
@include('web.adminUser.parts._stock')
{{-- @include('admin.parts._adminSite')--}}
{{-- @include('admin.parts._listPendingServiceAdminSite')--}}
{{-- @include('admin.parts._listPendingServiceSponsorAdminSite')--}}
{{-- @include('admin.parts._listClientAdminSite') --}}
{{-- @include('admin.parts._listServiceAdminSite')  --}}
@endsection

@section('js')
<script src="{{ asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(function() {
        "use strict";
        // chart 8
        var options = {
            series: [
                @foreach($sales as $sale)
                    {{ $sale->quantity }},
                    @endforeach
                ],
            chart: {
                foreColor: '#9ba7b2',
                height: 330,
                type: 'pie',
            },
            colors: ["#0d6efd", "#6c757d", "#17a00e", "#f41127", "#ffc107"],
            labels: [
                @foreach($sales as $sale)
                '{{ $sale->product->name }}',
                @endforeach
            ],
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

<!-- <script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/chartjs/js/Chart.extension.js') }}"></script> -->

<script src="{{ asset('assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
@endsection