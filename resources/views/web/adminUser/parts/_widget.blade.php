<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Clientes</p>
                            <h4 class="my-1 text-info">{{ $clientsCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle text-white ms-auto"><a href="{{ route('list.client') }}"><i class='bx bxs-user'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Ventas Último Mes</p>
                            <h4 class="my-1 text-danger">${{ $salesSum }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle text-white ms-auto"><a href="{{ route('listMonth.invoice') }}"><i class='bx bxs-wallet'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Cantidad de Ventas último Mes</p>
                            <h4 class="my-1 text-success">{{ $chartsalesProducCount }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle text-white ms-auto"><a href="{{ route('listMonth.invoice') }}"><i class='bx bxs-bar-chart-alt-2'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>