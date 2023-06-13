<div class="page-content">
    <h6 class="mb-0 text-uppercase">Productos con poco stock</h6>
    <hr />
    <div class="card radius-10">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
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
                            <td>
                                <form action="{{ route('product.addStock', $stock) }}" method="POST">
                                    @csrf
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="numeric" class="form-control" name="quantity" value="{{ $stock->quantity }}" aria-describedby="inputGroup-sizing-sm" style="width : 1px; heigth : 1px; padding: 5px;">
                                        <button type="submit" class="input-group-text" id="inputGroup-sizing-sm"><i class='bx bx-save me-0'></i></button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="col">
                                    <a href="{{route('product.delete', $stock)}}" type="button" class="btn btn-outline-danger"><i class='lni lni-trash me-0'></i>
                                    </a>
                                    @if($stock->post == 'Si')
                                    <a href="{{route('product.unpost', $stock)}}" type="button" class="btn btn-outline-primary"><i class='lni lni-pause me-0'></i>
                                    </a>
                                    @else
                                    <a href="{{route('product.post', $stock)}}" type="button" class="btn btn-outline-primary"><i class='lni lni-play me-0'></i>
                                    </a>
                                    @endif
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