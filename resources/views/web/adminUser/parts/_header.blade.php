<div class="topbar d-flex align-items-center">
    <nav class="navbar navbar-expand">
        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
        </div>
        <div class="top-menu ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-icon">
                    <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                    </a>
                </li>
                @if($employeeIsOnline)
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="row row-cols-3 g-3 p-3">
                            <div class="col text-center">
                                <a href="{{ route('list.employee') }}">
                                    <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                                    </div>
                                </a>
                                <div class="app-title">Vendedores</div>
                            </div>
                            <div class="col text-center">
                                <a href="{{ route('dashboard.cash') }}">
                                    <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-dollar'></i>
                                    </div>
                                </a>
                                <div class="app-title">Caja</div>
                            </div>
                            <div class="col text-center">
                                <a href="{{ route('product.list') }}">
                                    <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-cart'></i>
                                    </div>
                                </a>
                                <div class="app-title">Productos</div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <!-- <span class="alert-count"></span> -->
                        <i class='bx bx-bell'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Notificaciones</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">Ver todas las notificaciones</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <!-- <span class="alert-count">8</span> -->
                        <i class='bx bx-comment'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Mensajes</p>
                            </div>
                        </a>
                        <div class="header-message-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="user-online">
                                        <img src="{{ asset('assets/admin/images/avatars/avatar-1.png') }}" class="msg-avatar">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                ago</span></h6>
                                        <p class="msg-info">The standard chunk of lorem</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">Ver todos los mensajes</div>
                        </a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if($employeeIsOnline)
                @if(employeeConnect()->avatar)
                <img src="{{ asset('assets/icons/avatars/'. employeeConnect()->avatar . '.png') }}" class="user-img">
                @else
                <img src="{{ asset('assets/icons/avatars/avatar.png') }}" class="user-img">
                @endif
                <div class="user-info ps-3">
                    <p class="user-name mb-0">{{ employeeConnect()->name }}</p>
                </div>
                @else
                <img src="{{ asset('assets/icons/avatars/avatar.png') }}" class="user-img">
                <div class="user-info ps-3">
                    <p class="user-name mb-0">{{ userConnect()->name }}</p>
                </div>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('shop.edit') }}"><i class="bx bx-customize"></i><span>Perfil Tienda</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Configuración</span></a>
                </li>
                <!-- <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                </li>
                <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                </li> -->
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Salir</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>