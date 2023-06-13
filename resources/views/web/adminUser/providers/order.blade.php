@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-3">
                            <a href="{{ route('new.order') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Nuevo Pedido</a>
                        </div>
                        <div class="col-lg-9 col-xl-9">
                            <form class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <h6>Pedidos Pendientes</h6>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Proveedor</th>
                            <th>Fecha Pedido</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->provider->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                            <td>
                                @if($order->status == '0')
                                    <p>Pendiente envio proveedor</p>
                                @elseif($order->status == '1')
                                    <p>Enviado a proveedor</p>                                
                                @endif
                            </td>
                            <td>
                                @if($order->internalCode != '0' AND $order->status == '1')
                                <div class="col">
                                    <a href="{{ route('addingStockPending.order', ['order' => $order->internalCode, 'stock' => $order->quantity]) }}" type="button" class="btn btn-sm btn-primary px-2"><i class="bx bx-plus mr-1"></i>Agregar al Stock</a>
                                </div>
                                @else
                                <div class="col">
                                    <a href="{{ route('addingProduct.order', $order) }}" type="button" class="btn btn-sm btn-info px-2"><i class="bx bx-plus mr-1"></i>Agregar producto</a>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
        $('#example').DataTable();
    });
</script>
@endsection