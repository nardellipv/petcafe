@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 border-end">
                <img src="{{ asset('shop/' . $product->shop_id . '/products/500-' . $product->image) }}" class="img-fluid" alt="{{ $product->image }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <div class="mb-3">
                        <dl class="row">
                            <dt class="col-sm-3">Precio Venta</dt>
                            <dd class="col-sm-9">${{ $product->sellPrice }}</dd>
                            @if($product->discount)
                            <dt class="col-sm-3">Precio Descuento</dt>
                            <dd class="col-sm-9">${{ $product->discount }}</dd>
                            @endif
                            <dt class="col-sm-3">Precio Compra</dt>
                            <dd class="col-sm-9">{{ $product->buyPrice }} </dd>
                        </dl>
                    </div>
                    <p class="card-text fs-6">{{ $product->description }}</p>
                    <dl class="row">
                        <dt class="col-sm-3">Código #</dt>
                        <dd class="col-sm-9">
                            @if(substr($product->internalCode,strlen('-')+1) != '')
                            {{ substr($product->internalCode,strlen('-')+1) }}
                            @else
                            -------
                            @endif
                        </dd>

                        <dt class="col-sm-3">Stock</dt>
                        <dd class="col-sm-9">{{ $product->quantity }} </dd>

                        <dt class="col-sm-3">Publicado</dt>
                        <dd class="col-sm-9">{{ $product->post }} </dd>

                        <dt class="col-sm-3">Fecha Expiración</dt>
                        <dd class="col-sm-9">{{ Carbon\Carbon::parse($product->expire)->format('d-m-Y') }} </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <hr />
        <div class="row row-cols-auto g-3">
            <div class="col">
                <a href="{{ route('product.edit', $product) }}" type="button" class="btn btn-primary px-5">Editar</a>
            </div>
            <div class="col">
                <a href="{{route('product.delete', $product)}}" type="button" class="btn btn-danger px-5">Eliminar</a>
            </div>
            @if($product->post == 'Si')
            <div class="col">
                <a href="{{ route('product.unpost', $product) }}" type="button" class="btn btn-warning px-5">Despublicar</a>
            </div>
            @else
            <div class="col">
                <a href="{{ route('product.post', $product) }}" type="button" class="btn btn-info px-5">Publicar</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection