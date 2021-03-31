<!-- ======= Nav Bar ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto">
            <a href="<?= base_url() ?> ">
                <img src="<?= base_url() ?>/public/pictures/peradk/logo.png" alt="" class="img-fluid">
            </a>
        </h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#hero">Inicio</a></li>
                <li><a href="#about">Productos</a></li>
                <li><a href="#catalogs">Cat&aacute;logos</a></li>
                <li><a href="#stores">Tiendas</a></li>
                <li><a href="#team">Nosotros</a></li>
                <li><a href="#contact">Cont&aacute;ctenos</a></li>


            </ul>
        </nav><!-- .nav-menu -->

        <a href="<?= base_url() . route_to('cart') ?>" class="get-started-btn scrollto">Carrito de Compras <?php if(isset($_SESSION['shoppingcart'])){echo '('.count($_SESSION['shoppingcart']).')';} ?></a>

    </div>
</header><!-- End Header -->