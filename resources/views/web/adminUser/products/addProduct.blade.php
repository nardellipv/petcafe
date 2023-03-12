@extends('layouts.mainAdminSite')

@section ('css')
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
                <form method="POST" action="{{ route('product.upgrade') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputProductTitle" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle" placeholder="Nombre" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputProductType" class="form-label">Proveedor</label>
                                        <select class="form-select" name="provider_id" id="inputProductType">
                                            <option>Elegir un proveedor</option>
                                            <option disabled>------------------</option>
                                            @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="inputProductDescription" name="description" rows="3" placeholder="Descripción del producto">{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Imagen del Producto</label>
                                    <input class="form-control form-control-sm" id="formFileSm" name="image" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Precio Costo</label>
                                        <input type="text" class="form-control" id="inputPrice" name="buyPrice" placeholder="Precio Costo" value="{{ old('buyPrice') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sellPrice" class="form-label">Precio Venta</label>
                                        <input type="text" class="form-control" id="sellPrice" name="sellPrice" placeholder="Precio de venta" value="{{ old('sellPrice') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discountPrice" class="form-label">Precio Descuento</label>
                                        <input type="text" class="form-control" id="discountPrice" name="discount" placeholder="Precio de Descuento" value="{{ old('discount') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="internalCode" class="form-label">Código del Producto</label>
                                        <input type="text" class="form-control" id="internalCode" name="internalCode" placeholder="Precio de Descuento" value="{{ old('internalCode') }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputCostPerPrice" class="form-label">Cantidad</label>
                                        <input type="text" class="form-control" id="inputCostPerPrice" name="quantity" placeholder="Stock producto" value="{{ old('quantity') }}">
                                    </div>
                                    <div class="col-md-7">
                                        <label for="inputStarPoints" class="form-label">Fecha Vto.</label>
                                        <input type="date" class="form-control" id="inputStarPoints" name="expire" placeholder="Vencimiento del Producto" value="{{ old('expire') }}">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check-danger form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="post" id="flexSwitchCheckCheckedDanger" checked>
                                            <label class="form-check-label" for="flexSwitchCheckCheckedDanger">Publicar Producto</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                        </div>
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
@endsection

@section('js')

@endsection