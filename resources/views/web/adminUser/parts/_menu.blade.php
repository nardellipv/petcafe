<ul class="metismenu" id="menu">
    <li class="menu-label">Menú</li>
    <li>
    <li>
        <a href="{{ route('dashboard.index') }}">
            <div class="parent-icon"><i class='bx bx-desktop'></i>
            </div>
            <div class="menu-title">Escritorio</div>
        </a>
    </li>
    @if($employeeIsOnline)
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-dollar'></i>
            </div>
            <div class="menu-title">Caja</div>
        </a>
        <ul>
            <li> <a href="{{ route('dashboard.cash') }}"><i class="bx bx-right-arrow-alt"></i>Movimiento Diario</a>
            </li>
            <li> <a href="{{ route('moveMoneyHistorical.cash') }}"><i class="bx bx-right-arrow-alt"></i>Movimiento Historico</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Productos</div>
        </a>
        <ul>
            <li> <a href="{{ route('product.list') }}"><i class="bx bx-right-arrow-alt"></i>Listado Productos</a>
            </li>
            <li> <a href="{{ route('product.add') }}"><i class="bx bx-right-arrow-alt"></i>Agregar Producto</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-dollar'></i>
            </div>
            <div class="menu-title">Ventas</div>
        </a>
        <ul>
            <li> <a href="{{ route('sale.add') }}"><i class="bx bx-right-arrow-alt"></i>Ingresar Venta</a>
            </li>
            <li> <a href="{{ route('listMonth.invoice') }}"><i class="bx bx-right-arrow-alt"></i>Ventas Mes Actual</a>
            </li>
            <li> <a href="{{ route('showHistorical.invoice') }}"><i class="bx bx-right-arrow-alt"></i>Ventas Acumuladas</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-bone'></i>
            </div>
            <div class="menu-title">Proveedores</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.provider') }}"><i class="bx bx-right-arrow-alt"></i>Listado Proveedores</a>
            </li>
            <li> <a href="{{ route('add.provider') }}"><i class="bx bx-right-arrow-alt"></i>Agregar Proveedor</a>
            </li>
            <li><a href="{{ route('list.order') }}"><i class="bx bx-right-arrow-alt"></i>Realizar Pedidos </a>
            </li>
            <li> <a href="{{ route('historical.order') }}"><i class="bx bx-right-arrow-alt"></i>Pedidos Historicos</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-user-check'></i>
            </div>
            <div class="menu-title">Clientes</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.client') }}"><i class="bx bx-right-arrow-alt"></i>Listado Clientes</a>
            </li>
            <li> <a href="{{ route('addNew.client') }}"><i class="bx bx-right-arrow-alt"></i>Agregar Cliente</a>
            </li>
        </ul>
    </li>
    @endif
    <!-- <li class="menu-label">Configuración</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-menu"></i>
            </div>
            <div class="menu-title">Menu Levels</div>
        </a>
        <ul>
            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level One</a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Two</a>
                        <ul>
                            <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Level Three</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li> -->
    <li class="menu-label">Configuración</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-user'></i>
            </div>
            <div class="menu-title">Vendedores</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.employee') }}"><i class="bx bx-right-arrow-alt"></i>Listado Vendedores</a>
            </li>
            @if($employeeIsOnline)
            <li class="{{ ($employeeIsOnline->type == 'Owner') ? "" : "list-group-item disabled" }}"> <a href="{{ route('add.employee') }}"><i class="bx bx-right-arrow-alt"></i>Agregar Vendedores</a>
            </li>
            @endif
        </ul>
    </li>

    <li class="menu-label"></li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="parent-icon"><i class='bx bx-log-out'></i>
            </div>
            <div class="menu-title">Salir</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
    </li>
</ul>