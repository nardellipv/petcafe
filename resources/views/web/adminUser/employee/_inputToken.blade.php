<div class="modal fade" id="modalToken-{{$employee->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingresar PIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('token.employee', $employee) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-sm-6">
                            <label for="inputEmailAddress2" class="col-form-label">Por favor ingrese PIN de 4 dígitos</label>
                        </div>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" maxlength="4" id="inputToken" name="token" value="{{ old('token') }}" placeholder="Ingrese un PIN de 4 dígitos">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>