<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-5">
            <h6 class="mb-0 text-uppercase">Agregar Nuevo Cliente</h6>
            <hr />
            <div class="card-body">
                <div class="card border-top border-0 border-4 border-info">
                    <form method="POST" action="{{ route('client.add') }}">
                        @csrf
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="row mb-3">
                                    <label for="nameClient" class="col-sm-3 col-form-label">Nombre y Apellido</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="nameClient" value="{{ old('name') }}" placeholder="Nombre y Apellido" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail4" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="inputEmail4" value="{{ old('email') }}" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="city_id" class="col-sm-3 col-form-label">Localidad</label>
                                    <div class="col-sm-9">
                                        <select name="city_id" id="inputState" class="form-select" required>
                                            <option value="{{ shopConnect()->city_id }}">{{ shopConnect()->city->name }}</option>
                                            <option disabled>-----------------------</option>
                                            @foreach($cityClient as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputAddress" class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="inputAddress" rows="3" name="address" placeholder="San Martin 123, ciudad" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone" class="col-sm-3 col-form-label">Teléfono</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Teléfono" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info px-5">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <h6 class="mb-0 text-uppercase">Mejores 10 Clientes</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div id="chart8"></div>
                </div>
            </div>
        </div>
    </div>
</div>