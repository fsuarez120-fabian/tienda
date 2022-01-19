<!-- ======= NavBar ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto">
            <a href="<?php echo base_url() ?> ">
                <img src="<?php echo base_url() ?>/public/pictures/peradk/logo4.png" alt="" class="img-fluid">
            </a>
        </h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="<?php echo base_url() ?>">Inicio</a></li>
                <li class="drop-down"><a href="#">Productos</a>
                    <ul>
                        <li class="drop-down"><a href="#">PeRa Alpargatas</a>
                            <ul>
                                <li><a href="<?= base_url() . route_to('show_produts', 'clasicas') ?>">PeRa Clasicas</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'plataformas') ?>">PeRa Plataformas</a></li>
                                <li><a href="<?= base_url() . route_to('list_specials') ?>">PeRa Piedritas - Estrellitas</a></li>
                            </ul>
                        </li>
                        <li class="drop-down"><a href="#">PeRa Ropa</a>
                            <ul>
                                <li><a href="<?= base_url() . route_to('show_produts', 'tapabocas') ?>">PeRa Tapabocas</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'pijamas') ?>">PeRa Pijama</a></li>
                                <li><a href="<?= base_url() . route_to('list_shirts') ?>">PeRa Camisetas</a></li>
                                <!-- <li><a href="<?= base_url() . route_to('show_produts', 'leggings') ?>">PeRa Leggings</a></li> -->
                                <li><a href="<?= base_url() . route_to('show_produts', 'jeans') ?>">PeRa Jeans</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'bodycuellotortuga') ?>">PeRa Body Cuello Tortuga</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'bodylargas') ?>">PeRa Body Manga Larga</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'bodysisas') ?>">PeRa Body Manga Sisa</a></li>
                                <li><a href="<?= base_url() . route_to('show_produts', 'pantaloneta') ?>">PeRa Pantalonetas</a></li>
                                <!-----<li><a href="<?= base_url('/productos/medias/1') ?>">PeRa Medias</a></li>
                                <li><a href="<?= base_url() . route_to('list_cuerina') ?>">PeRa Cuerina</a></li>---->
                                <!-- <li><a href="<?= base_url() . route_to('show_produts', 'busos') ?>">PeRa Busos Hombre</a></li> -->
                            </ul>
                        </li>
                        <li><a href="<?= base_url('/productos/rizos/1') ?>">PeRa Rizos</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url('#stores'); ?>">Tiendas</a></li>
                <li><a href="<?php echo base_url('#contact'); ?>">Contactenos</a></li>
                <li><a href="<?php echo base_url('#catalogs'); ?>">Catalogos</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        <a href="<?= base_url() . route_to('cart') ?>" class="get-started-btn scrollto">
            <img style="max-height: 3rem;" src="<?= base_url() ?>/public/pictures/peradk/icon_cart.png" alt="" class="img-fluid">
            <?php if (isset($_SESSION['shoppingcart'])) {
                echo '(' . count($_SESSION['shoppingcart']) . ')';
            } ?>
        </a>
    </div>
</header><!-- End Header -->