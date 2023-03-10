<div class="page-content">
    <h6 class="mb-0 text-uppercase">Productos con poco stock</h6>
    <hr/>
    <div class="card radius-10">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio Venta</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stocks as $stock)
                        <tr>
                            <td>#{{ $stock->internalCode }}</td>
                            <td>{{ $stock->name }}</td>
                            <td>$ {{ $stock->sellPrice }}</td>
                            <td>{{ $stock->quantity }}</td>
                            <td>
                                <div class="col">
                                    <a href="{{route('product.delete', $stock)}}" type="button" class="btn btn-outline-danger"><i class='lni lni-trash me-0'></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-primary"><i class='lni lni-circle-plus me-0'></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary"><i class='lni lni-volume-mute me-0'></i>
                                    </button>
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
