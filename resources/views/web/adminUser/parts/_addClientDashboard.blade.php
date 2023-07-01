<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Agregar un nuevo usuario
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
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
                                                        <button type="submit" class="btn btn-info px-5">Agregar Cliente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Agregar un nuevo vendedor
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card border-top border-0 border-4 border-info">
                                <form method="POST" action="{{ route('upgrade.employee') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="row mb-3">
                                                <label for="nameClient" class="col-sm-3 col-form-label">Nombre y Apellido</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputEnterYourName" name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre y Apellido">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="nameClient" class="col-sm-3 col-form-label">Teléfono</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputPhoneNo2" name="phone" value="{{ old('phone') }}" placeholder="Ingrese teléfono">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail4" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="inputEmailAddress2" name="email" value="{{ old('email') }}" placeholder="Email">
                                                </div>
                                            </div>
                                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tipo</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Owner">
                                                <label class="form-check-label" for="inlineRadio1">Dueño</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Employee">
                                                <label class="form-check-label" for="inlineRadio2">Vendedor</label>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail4" class="col-sm-3 col-form-label">PIN <small>(4 dígitos)</small></label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" maxlength="4" id="inputToken" name="token" value="{{ old('token') }}" placeholder="Ingrese un PIN de 4 dígitos">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputAddress" class="col-sm-3 col-form-label">Dirección</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="inputAddress" rows="3" name="address" placeholder="San Martin 123, ciudad" required></textarea>
                                                </div>
                                            </div>
                                            @if($employeeIsOnline)
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-info px-5 {{ ($employeeIsOnline->type == 'Owner') ? "" : "disabled" }}"">Agregar Vendedor</button>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>