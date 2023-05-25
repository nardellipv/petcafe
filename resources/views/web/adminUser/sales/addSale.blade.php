@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="row">
        @include('web.alerts.error')
        <div class="col-12 col-lg-5 col-xl-5">
            <div class="card radius-10">
                <form method="POST" action="{{ route('sale.productAdd') }}">
                    @csrf
                    <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                            <div class="mb-3">
                                <select class="single-select" name="product_id" require onchange='location = this.options[this.selectedIndex].value;'>
                                    @if(!Empty($productChoose))
                                    <option value="{{ $productChoose->id }}">{{ $productChoose->name }} - #{{ $productChoose->internalCode }}</option>
                                    <option disabled>-----------------------------</option>
                                    @else
                                    <option>Seleccione un producto</option>
                                    <option disabled>----------------</option>
                                    @endif

                                    @foreach($products as $product)
                                    @if($product->quantity <= 0) <option value="" disabled>{{ $product->name }} - #{{ $product->internalCode }} | Sin Stock</option>
                                        @else
                                        <option value="{{ route('sale.productChoose', ['id'=>$product->id]) }}">{{ $product->name }} - #{{ $product->internalCode }}</option>
                                        @endif
                                        @endforeach

                                </select>
                            </div>

                            @if(!Empty($productChoose))

                            <div class="col-md-6">
                                <label for="inputCostPerPrice" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Cantidad a vender" value="1">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCostPerPrice" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="inputCostPerPrice" placeholder="Stock producto" value="{{ $productChoose->quantity, old('quantity') }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="sellPrice" class="form-label">Precio Lista</label>
                                <input type="text" class="form-control" id="sellPrice" placeholder="Precio de venta" value="{{ $productChoose->buyPrice, old('buyPrice') }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="discountPrice" class="form-label">Precio Venta</label>
                                <input type="text" class="form-control" id="discountPrice" name="sellPrice" placeholder="Precio de Descuento" value="{{ $productChoose->sellPrice, old('sellPrice') }}">
                            </div>
                            <div class="col-md-12">
                                <label for="comment" class="form-label">Comentario</label>
                                <textarea class="form-control" id="comment" name="comment" placeholder="Comentario sobre la venta" value="{{ $productChoose->comment, old('comment') }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Agregar Venta</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-lg-7 col-xl-7">
            <div class="card radius-10">
                <div class="border border-3 p-4 rounded">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Unidad</th>
                                <th scope="col">Precio Total</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($productsAdded->isEmpty())
                            <tr class="text-center">
                                <td colspan="5">
                                    <p class="text-danger"><strong>Sin Productos</strong></p>
                                </td>
                            </tr>
                            @else
                            @foreach($productsAdded as $key=>$productAdded)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $productAdded->product->name }}</td>
                                <td>{{ $productAdded->quantity }}</td>
                                <td>$ {{ $productAdded->sellPrice / $productAdded->quantity }}</td>
                                <td>$ {{ $productAdded->sellPrice }}</td>
                                <td>
                                    <div class="col">
                                        <a href="{{route('sale.productDelete', $productAdded)}}" type="button" class="btn btn-outline-danger">
                                            <i class='lni lni-trash me-0'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Total</strong></td>
                                <td colspan="2"><strong>{{ $sumProduct }}</strong></td>
                                <td><strong>$ {{ $sumTotal }}</strong></td>
                                <td>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            @if(!$productsAdded->isEmpty())
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <form method="POST" action="{{ route('saleInvoice.register') }}" class="row g-2">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><strong>Medio de Pago</strong></label>
                            <div class="col-sm-9">
                                @foreach($payments as $key=>$payment)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment" id="inlineCheckbox{{ $key }}" value="{{ $payment->payment_id }}" checked>
                                    <label class="form-check-label" for="inlineCheckbox{{ $key }}" require>{{ $payment->payment->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label"><strong>Cliente</strong></label>
                            <div class="col-sm-9">
                                <select class="single-select" name="client_id" require>
                                    <option value="0">Venta Sin Cliente</option>
                                    <option disabled>----------------</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg px-5">Generar Venta</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
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
@endsection