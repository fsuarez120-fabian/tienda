<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">


    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <h1>BRUTOS PERO DECIDIDOS!!!</h1>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <iframe class="video-mayorista" src="https://www.youtube.com/embed/DVhFnXpvM9M" title="PeRa DK" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="text-center">
                    <a href="#about" class="btn-get-started scrollto">PeRa Productos</a>
                    <a data-href="https://www.youtube.com/watch?v=BIrhmzL_bdA" class="venobox btn-watch-video" data-autoplay="true" data-vbtype="video">Nuestra Historia <i class="icofont-play-alt-2"></i></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url() ?>/public/pictures/peradk/twologo3.png" class="img-fluid animated" alt="">
            </div>
        </div>


    </div>


</section><!-- End Hero -->

<main id="main">

    <!-- ======= Productos Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>PeRa Productos</h2>
            </div>

            <div class="row">

                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'clasicas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/clasica.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'plataformas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/plataforma.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('list_specials') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/estrellaspiedritas.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('list_shirts') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/camisetas.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'kids') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/kids.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url()  . route_to('show_produts', 'tapabocas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/tapabocas.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'jeans') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/jeans.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'bodysisas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/sisa.jpeg" alt=""></a></div>



                <div class="d-none d-lg-block d-xl-block w-100"></div>

                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'bodylargas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/larga.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'bodycuellotortuga') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/cuellotortuga.png" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'pantaloneta') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/pantaloneta.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'leggings') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/leggings.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'busos') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/busoscaballero.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url() . route_to('show_produts', 'pijamas') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/pijamas.jpeg" alt=""></a></div>
                <!--<div class="col-6 col-md-4 col-lg"><a href="<?= base_url('/productos/medias/1') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/medias.jpeg" alt=""></a></div>-->
                <div class="col-6 col-md-4 col-lg"><a href="<?= base_url('/productos/rizos/1') ?>"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/rizo.jpeg" alt=""></a></div>
                <div class="col-6 col-md-4 col-lg"><a href="https://peradk.com/lk/mi-cartilla-pera-d-k/"><img class="img-fluid" src="<?php echo base_url() ?>/public/pictures/categories/cartilla.jpeg" alt=""></a></div>

            </div>

        </div>
    </section><!-- End Productos Section -->


    <!-- ======= Catalogs Section ======= -->
    <section id="catalogs" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Descargar Cat&aacute;logos</h2>
            </div>

            <div class="row">

                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="info">

                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_clasicas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Cl&aacute;sicas</h4>

                                    </div>
                                </a>

                            </div>
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_plataformas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Plataformas</h4>

                                    </div>
                                </a>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_piedritas_estrellitas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Piedritas - Estrellitas</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_tapabocas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Tapabocas</h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_camisetas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Camisetas</h4>

                                    </div>
                                </a>

                            </div>

                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_kids.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Camisetas Kids</h4>

                                    </div>
                                </a>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_body_cuello_tortuga.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Body Cuello Tortuga</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_body_sisa.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Body Sisa</h4>
                                    </div>
                                </a>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_body_manga_larga.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logos PeRa Body Manga Larga</h4>

                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_pantalonetas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Pantalonetas</h4>
                                    </div>
                                </a>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_jeans_dama.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Jeans</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_leggings.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Leggings</h4>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_pijamas.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Pijamas</h4>
                                    </div>
                                </a>
                            </div>


                            <div class="col">
                                <a href="https://peradk.com/public/archivos/pera_familia.pdf" target="”_blank”">
                                    <div class="address">
                                        <i class="icofont-pear"></i>
                                        <h4>Cat&aacute;logo PeRa Familia</h4>

                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Catalogs Section -->

    <!-- ======= Tiendas Section ======= -->
    <section id="stores" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>PeRa Tiendas</h2>
            </div>

            <div class="row">

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <a href="https://api.whatsapp.com/send?phone=573134848876" target="”_blank”">
                            <img src="<?php echo base_url() ?>/public/pictures/peradk/tiendapamplona.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <a href="https://api.whatsapp.com/send?phone=573232534285" target="”_blank”">
                            <img src="<?php echo base_url() ?>/public/pictures/peradk/tiendamedellin.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <a href="https://api.whatsapp.com/send?phone=573118144303" target="”_blank”">
                            <img src="<?php echo base_url() ?>/public/pictures/peradk/tiendacali.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <a href="https://api.whatsapp.com/send?phone=573107706098" target="”_blank”">
                            <img src="<?php echo base_url() ?>/public/pictures/peradk/tiendayopal.png" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Tiendas Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3>PeRa D.K</h3>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle">Nosotros</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Nosotros Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Nosotros</h2>

                <p1>Hola PeRa Amigos!

                    Somos David y Kathe creadores de PeRa D.K. 🍐 <br>Fabricamos las Alpargatas y prendas m&aacute;s c&oacute;modas con insumos y mano de obra 100% Colombiana de alta calidad. Estamos ubicados en Pamplona Norte de Santander y hacemos env&iacute;os seguros a cualquier lugar del mundo.<br>

                    Nuestro prop&oacute;sito de vida es inspirar a otras personas a emprender y creer en sus sueños. Estamos seguros que cuando uses algunos de nuestros PeRa Productos vas a sentir la felicidad y la magia con que est&aacute;n elaborados.<br>

                    Gracias por Soñar Junto Nosotros y estamos para Servirte Siempre. Te PeRa Queremos 🤍</p1>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <img src="<?php echo base_url() ?>/public/pictures/peradk/nosotros1.jpg" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
                        <img src="<?php echo base_url() ?>/public/pictures/peradk/nosotros2.jpg" alt="" class="img-fluid">
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Nosotros Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Cont&aacute;ctanos</h2>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <a href="https://www.google.com/maps/place/Cl.+5+%234-31,+Pamplona,+Norte+de+Santander/@7.377605,-72.649091,16z/data=!4m5!3m4!1s0x8e68811736ec3479:0xbcaad6b014650a4f!8m2!3d7.3776046!4d-72.6490914?hl=es" target="”_blank”">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Direcci&oacute;n:</h4>
                                <p>Calle 5 # 4-31 Barrio Centro</p>
                            </div>
                        </a>
                        <a href="mailto:administracion@peradk.com">
                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>administracion@peradk.com</p>
                            </div>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=573212884665" target="”_blank”">
                            <div class="phone">
                                <i class="icofont-brand-whatsapp"></i>
                                <h4>WhatsApp:</h4>
                                <p>321 288 4665</p>
                            </div>
                        </a>



                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <div class="info">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.78886793026!2d-72.64917731060582!3d7.377544186559913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e68811736ec3479%3A0xbcaad6b014650a4f!2sCl.%205%20%234-31%2C%20Pamplona%2C%20Norte%20de%20Santander!5e0!3m2!1ses!2sco!4v1608508418575!5m2!1ses!2sco" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->



</main><!-- End #main -->