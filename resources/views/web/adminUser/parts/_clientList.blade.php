<div class="page-content">
    <h6 class="mb-0 text-uppercase">Listado Clientes</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal-{{$client->id}}"> {{ $client->name }}</a></td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                        </tr>
                        @include('web.adminUser.clients._modalClientInfo')
                        @endforeach
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>