        <!-- Sidebar -->
        <ul class="navbar-nav bg-color sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="https://i.ibb.co/b6RqSDY/Logo-removebg-preview.png" alt="Sistemas de Maxima Seguridad"
                        width="40" height="40" class="d-inline-block align-text-top">
                </div>
                <div class="sidebar-brand-text mx-3">Máxima seguridad</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fas fa-home"></i>
                    <span>Bienvenido</span></a>
            </li>

            <!-- Divider -->

             @can('reporte.index')
             <hr class="sidebar-divider my-0">

             <li class="nav-item   {{ !Route::is('reporte.index') ?: 'active' }}">
                 <a class="nav-link" href="{{ route('reporte.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             @endcan


            @can('productos.index')
            <hr class="sidebar-divider my-0">
                <li class="nav-item  {{ request()->routeIs('productos.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('productos.index') }}">
                        <i class="fas fa-boxes"></i>
                        <span>Inventario</span></a>
                </li>
            @endcan

            @can('cart.cart')
                <hr class="sidebar-divider my-0">
                <li class="nav-item {{ !Route::is('cart.cart') ?: 'active' }}">
                    <a class="nav-link" href="{{ url('/Cart/Carrito') }}">
                        <i class="fas fa-store"></i>
                        <span>Catálogo</span></a>
                </li>
            @endcan

            @can('cita.index')
                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ !Route::is('cita.index') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('cita.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Ver citas</span>
                    </a>
                </li>
            @endcan

            @can('cita.create')
                <hr class="sidebar-divider my-0">
                <li class="nav-item {{ !Route::is('cita.create') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('cita.create') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Agendar citas</span>
                    </a>
                </li>
            @endcan

            @can('permission.index')
                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ !Route::is('permission.index') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('permission.index') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Permisos</span>
                    </a>
                </li>
            @endcan

            @can('role.index')
                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ !Route::is('role.index') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="fas fa-dice-d20"></i>
                        <span>Lista de roles</span>
                    </a>
                </li>
            @endcan

            @can('user.index')
                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ !Route::is('user.index') ?: 'active' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-users fa-fw"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
            @endcan

             @can('pedido.index') 
            <hr class="sidebar-divider my-0">

            <li class="nav-item   {{ !Route::is('pedido.index') ?: 'active' }}">
                <a class="nav-link" href="{{ route('pedido.index') }}">
                    <i class="fas fa-qrcode"></i>
                    <span>Ver pedidos</span>
                </a>
            </li>
            @endcan


            @can('cart.invoices')
            <hr class="sidebar-divider my-0">

            <li class="nav-item   {{ !Route::is('cart.invoices') ?: 'active' }}">
                <a class="nav-link" href="{{ route('cart.invoices') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Nota de pago</span>
                </a>
            </li>
            @endcan

            


            



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
