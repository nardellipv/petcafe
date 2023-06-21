@if(!$employeeIsOnline)
<div class="page-content">
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark">Seleccionar un Vendedor</h6>
                <div class="text-dark">Por favor seleccine un vendedor para continuar. Ir a <a href="{{ route('list.employee') }}"> vendedores</a></div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif