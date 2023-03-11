<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
        <div class="col">
            <div class="card radius-10 bg-warning bg-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-dark">Total Clientes</p>
                            <h4 class="text-dark my-1">{{ $clientsCount }}</h4>
                        </div>
                        <div class="text-dark ms-auto font-35"><i class='bx bx-user-pin'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-danger bg-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Ventas Último Mes</p>
                            <h4 class="my-1 text-white">${{ $salesSum }}</h4>
                        </div>
                        <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>