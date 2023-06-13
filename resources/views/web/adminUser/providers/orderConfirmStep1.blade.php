@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-dark"><i class='bx bx-info-square'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark">Información Importante</h6>
                <div class="text-dark">Debe tener habilitada la opción de poder abrir una nueva pestaña en su browser.
                    Luego de realizar el pedido este se verá reflejado en <a href="{{ route('list.order') }}">Realizar Pedidos</a></div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <a class="btn btn-sm btn-primary px-5" href="https://web.whatsapp.com/send?phone={{ $providerChoose->provider->phone }}&text=Hola%20te%20escribo%20de%20{{ shopConnect()->name }}%20Direccion%20{{ shopConnect()->address }}%20necesito%20los%20siguiente%20productos%20' @foreach($orderPending as $order) Producto: {{ $order->name  }} - Cantidad: {{ $order->quantity }} - Comentario: {{ $order->note }}%0a @endforeach'" target="_blank"><i class='lni lni-whatsapp'></i>WhatsApp</a>
                </div>
                <div class="col">
                    <a href="{{ route('sendingEmail.order', $providerChoose->provider_id) }}" type="button" class="btn btn-sm btn-danger px-5"><i class='lni lni-envelope'></i>Email</a>
                </div>
            </div>
            <br>

            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Cantidad</th>
                            <th>Nota</th>
                            <th>Proveedor</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($showOrders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->note ? Str::limit($order->note, 50) : 'Sin Nota' }}</td>
                            <td>{{ $order->provider->name }}</td>
                            <td>
                                <div class="col">
                                    <a href="{{ route('deletePending.order', $order) }}" type="button" class="btn btn-outline-danger"><i class='lni lni-trash me-0'></i>
                                    </a>
                                </div>
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