@extends('layouts.mainAdminSite')

@section('css')
<link href="{{ asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Publicado</th>
                            <th>Proveedor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->internalCode ? $product->internalCode : '----' }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            @if($product->discount)
                            <td><span class="me-2 text-decoration-line-through text-secondary">${{ $product->sellPrice }}</span> ${{ $product->discount }}</td>
                            @else
                            <td>${{ $product->sellPrice }}</td>
                            @endif
                            <td>{{ $product->post }}</td>
                            <td>{{ $product->provider->name }}</td>
                            <td>
                                <div class="col">
                                    <div class="btn-group" role="group">
                                        <a href="{{route('product.show', $product)}}" type="button" class="btn btn-outline-primary"><i class="bx bx-show-alt"></i></a>
                                        <a href="{{route('product.edit', $product)}}" type="button" class="btn btn-outline-primary"><i class="bx bx-edit-alt"></i></a>
                                        <a href="{{route('product.delete', $product)}}" type="button" class="btn btn-outline-danger"><i class="bx bx-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Publicado</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
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