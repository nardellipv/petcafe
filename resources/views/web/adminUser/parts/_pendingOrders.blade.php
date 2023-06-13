<div class="page-content">
    <h6 class="mb-0 text-uppercase">Pedidos Pendientes</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
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
                        @foreach($pendingOrder as $order)
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
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>