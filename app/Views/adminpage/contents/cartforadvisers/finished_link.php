<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear link Carrito de Compras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Link carrito de compras</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <section id="team" class="team section-bg">
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    <div class="section-title">
                        <br>
                        <h2>Link Carrito de Compras</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="info">

                                <div class="text-center">
                                    <input value="<?= $link['url_link'] ?>" class="btn-block btn-outline-secondary btn-lg">
                                </div>
                                <br>
                                <div class="text-center">
                                    <a target="”_blank”" href="<?= base_url() . route_to('cart_advisers', $link['order_link']); ?>">
                                        <input type="hidden" name="department" value="5">
                                        <button type="submit" class="btn-aceptar">
                                            Ver - Revisar
                                        </button>
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->
</div>