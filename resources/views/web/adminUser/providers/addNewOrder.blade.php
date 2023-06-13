@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Agregar Nuevo Producto</h5>
            <hr />
            @if($providers->isEmpty())
            <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <h6 class="mb-0 text-dark">Agregar Proveedores</h6>
                            <div class="text-dark">Para poder cargar productos debes agregar al menos un proveedor</div>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ route('add.provider') }}" class="btn btn-outline-dark px-5">Agregar Proveedor</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @include('web.alerts.error')
            <div class="form-body mt-4">
                <div class="row">
                    <form method="POST" action="{{ route('newPending.order') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="inputProductType" class="form-label">Proveedor</label>
                                        <select class="form-select" name="provider_id" id="inputProductType">
                                            @if(!$orderPending->isEmpty())
                                            <option value="{{ $providerChoose->provider_id }}">{{ $providerChoose->provider->name }}</option>
                                            @else
                                            <option>Elegir un proveedor</option>
                                            <option disabled>------------------</option>
                                            @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Seleccione un Producto</label>
                                        <select class="single-select" name="idProduct" id="idProduct">
                                            <option value="0">Seleccionar Producto</option>
                                            <option disabled>------------------</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} - Stock {{ $product->quantity }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputProductName" class="form-label">Ingrese Producto</label>
                                        <input type="text" name="name" class="form-control" id="inputProductName" placeholder="Producto" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputProductQuantity" class="form-label">Cantidad</label>
                                        <input type="text" name="quantity" class="form-control" id="inputProductQuantity" placeholder="Cantidad" value="{{ old('quantity') }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputProductDescription" class="form-label">Agregar una nota</label>
                                        <textarea class="form-control" id="inputProductDescription" name="note" rows="3" placeholder="Nota del pedido">{{ old('note') }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Agregar Producto</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(!$orderPending->isEmpty())
    <div class="card">
        <div class="card-body">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <a href="{{ route('step1Confirm.order') }}" type="button" class="btn btn-sm btn-danger px-5"><i class='lni lni-checkbox'></i>Continuar con el Pedido</a>
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
                        @foreach($orderPending as $order)
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
    @endif
</div>
@endsection

@section('js')
<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>

<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>

<script>
    $(document).ready(function() {
        $("#idProduct").on("change", function() {
            if (parseInt($("#idProduct").val()) == "0") {
                $("#inputProductName").prop("disabled", false);
            } else {
                $("#inputProductName").prop("disabled", true);
            }
        });
    });
</script>
@endsection