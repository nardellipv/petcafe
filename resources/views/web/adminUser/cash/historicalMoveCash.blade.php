@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
<h6 class="mb-0 text-uppercase">Movimientos Historicos</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example3" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Motivo</th>
                        <th>Tipo</th>
                        <th>Fecha y Hora</th>
                        <th>Vendedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashesHistorical as $key=>$cash)
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
                        <td>{{ \Carbon\Carbon::parse($cash->created_at)->format('d/m/Y - H:s') }}hs.</td>
                        <td>{{ $cash->employee->name }}</td>
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
        var table = $('#example3').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection