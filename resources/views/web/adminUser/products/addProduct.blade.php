@extends('layouts.mainAdminSite')

@section ('css')
@endsection

@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Agregar Nuevo Producto</h5>
            <hr />
            @include('web.alerts.error')
            <div class="form-body mt-4">
                <form method="POST" action="{{ route('product.upgrade') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                <div class="col-md-6">
                                <label for="inputProductTitle" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="inputProductTitle" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6">
                                    <label for="inputProductType" class="form-label">Proveedor</label>
                                        <select class="form-select" id="inputProductType">
                                            <option></option>
                                            <option value="1">One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="inputProductDescription" name="description" rows="3" placeholder="Descripción del producto"></textarea>
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
                                        <input type="text" class="form-control" id="inputPrice" name="buyPrice" placeholder="Precio Costo">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sellPrice" class="form-label">Precio Venta</label>
                                        <input type="text" class="form-control" id="sellPrice" name="sellPrice" placeholder="Precio de venta">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discountPrice" class="form-label">Precio Descuento</label>
                                        <input type="text" class="form-control" id="discountPrice" name="discount" placeholder="Precio de Descuento">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="internalCode" class="form-label">Código del Producto</label>
                                        <input type="text" class="form-control" id="internalCode" name="internalCode" placeholder="Precio de Descuento">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputCostPerPrice" class="form-label">Cantidad</label>
                                        <input type="email" class="form-control" id="inputCostPerPrice" name="quantity" placeholder="Stock producto">
                                    </div>
                                    <div class="col-md-7">
                                        <label for="inputStarPoints" class="form-label">Fecha Vto.</label>
                                        <input type="date" class="form-control" id="inputStarPoints" name="expire" placeholder="Vencimiento del Producto">
                                    </div>
                                    <!-- <div class="col-12">
                                    <label for="inputProductType" class="form-label">Product Type</label>
                                    <select class="form-select" id="inputProductType">
                                        <option></option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputVendor" class="form-label">Vendor</label>
                                    <select class="form-select" id="inputVendor">
                                        <option></option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputCollection" class="form-label">Collection</label>
                                    <select class="form-select" id="inputCollection">
                                        <option></option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div> -->
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