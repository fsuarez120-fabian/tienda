<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() . route_to('admin_page') ?>" class="brand-link elevation-4">
        <img src="<?= base_url() . route_to('images_peradk') ?>/pera.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PeRa DK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(route_to('images_employees')).'/'.session()->admin_image ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->admin_name.' '.session()->admin_surname ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!--<li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="nav-header">PEDIDOS</li>
                <li class="nav-item">
                    <a href="<?= base_url(route_to('admin_page_orders_with_state_final')) ?>" class="nav-link">
                        <i class="fas fa-shoe-prints nav-icon"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(route_to('admin_page_orders')) ?>" class="nav-link">
                        <i class="fas fa-tshirt nav-icon"></i>
                        <p>
                            Todos Pedidos
                        </p>
                    </a>
                </li>
                
                <li class="nav-header">PRODUCTOS</li>
                <li class="nav-item">
                    <a href="<?= base_url(route_to('admin_page_products')) ?>" class="nav-link">
                        
                        <i class="fas fa-pen nav-icon"></i>
                        <p>
                            Agregar Producto
                        </p>
                    </a>
                </li>


                
                
                
              
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>