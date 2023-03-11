<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('dashboard.index') }}">
            <div class="parent-icon"><i class='bx bx-desktop'></i>
            </div>
            <div class="menu-title">Escritorio</div>
        </a>
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
            <li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
            </li>
            <li> <a href="{{ route('product.add') }}"><i class="bx bx-right-arrow-alt"></i>Agregar Producto</a>
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
            <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Ultimos Pedidos</a>
            </li>
        </ul>
    </li>
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