<main id="main">
    <!-- ======= Iniciar Sesion Section ======= -->
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            </div>
            <div class="info">
                <form action="<?= base_url() . route_to('cart'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <img class="customimage img-fluid" src="<?= base_url() . route_to('images_products') . '/' . $products[0]['image_product']  ?>" alt="Imagen no encontrada">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="text-right">
                                <br>
                                <h3> <?= 'Ref: ' . $products[0]['reference'] ?></h3>
                                <h1>$ <?= number_format($category['price_category']) ?></h1>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <select name="horma" id="horma" class="form-control" required>
                                        <option value="">* Horma</option>
                                        <option value="mujer">Mujer</option>
                                        <?php
                                        if (!($products[0]['reference'] == 96
                                            || $products[0]['reference'] == 93
                                            || $products[0]['reference'] == 92
                                            || $products[0]['reference'] == 91
                                            || $products[0]['reference'] == 90
                                            || $products[0]['reference'] == 89
                                            || $products[0]['reference'] == 88
                                            || $products[0]['reference'] == 95
                                            || $products[0]['reference'] == 94
                                            || $products[0]['reference'] == 82
                                            || $products[0]['reference'] == 81
                                            || $products[0]['reference'] == 80
                                            || $products[0]['reference'] == 73
                                            || $products[0]['reference'] == 70
                                            || $products[0]['reference'] == 64
                                            || $products[0]['reference'] == 60
                                            || $products[0]['reference'] == 58)) {
                                        ?>
                                            <option value="hombre">Hombre</option>
                                        <?php } ?>

                                        <?php
                                        if (!$productkid) {
                                        } else {
                                            if (!($products[0]['reference'] == 96
                                                || $products[0]['reference'] == 93
                                                || $products[0]['reference'] == 92
                                                || $products[0]['reference'] == 91
                                                || $products[0]['reference'] == 90
                                                || $products[0]['reference'] == 89
                                                || $products[0]['reference'] == 88
                                                || $products[0]['reference'] == 95
                                                || $products[0]['reference'] == 94
                                                || $products[0]['reference'] == 82
                                                || $products[0]['reference'] == 81
                                                || $products[0]['reference'] == 80
                                                || $products[0]['reference'] == 73
                                                || $products[0]['reference'] == 70
                                                || $products[0]['reference'] == 64
                                                || $products[0]['reference'] == 60
                                                || $products[0]['reference'] == 58)) {
                                        ?>
                                                <option value="nino">Niño</option>
                                            <?php }  ?>
                                            <option value="nina">Niña</option>
                                        <?php
                                        } ?>

                                    </select>
                                    <p class="form-text text-muted">
                                        <?php
                                        if (!($products[0]['reference'] == 96
                                            || $products[0]['reference'] == 93
                                            || $products[0]['reference'] == 92
                                            || $products[0]['reference'] == 91
                                            || $products[0]['reference'] == 90
                                            || $products[0]['reference'] == 89
                                            || $products[0]['reference'] == 88
                                            || $products[0]['reference'] == 95
                                            || $products[0]['reference'] == 94
                                            || $products[0]['reference'] == 82
                                            || $products[0]['reference'] == 81
                                            || $products[0]['reference'] == 80
                                            || $products[0]['reference'] == 73
                                            || $products[0]['reference'] == 70
                                            || $products[0]['reference'] == 64
                                            || $products[0]['reference'] == 60
                                            || $products[0]['reference'] == 58)) { ?>
                                            <b>Horma para Hombre y Mujer 🍐</b><br>
                                        <?php
                                        } else { ?>
                                            <b>Horma exclusiva para Mujer y Niña🍐</b><br>
                                        <?php
                                        } ?>
                                    </p>
                                </div>
                                <div class="col">

                                    <div id="sizes1" name="sizes1">
                                    </div>


                                    <input type="hidden" name="observation" value="">

                                </div>
                            </div>

                            <select class="form-control" name="quantity" id="cantidad" required>
                                <option value="1">Cantidad 1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                            <br>
                            <div class="col-12">
                                <div class="text-center">

                                    <input type="hidden" name="reference" value="<?php echo $products[0]['reference'] ?>">
                                    <input type="hidden" name="r" value="addproduct">
                                    <input type="hidden" name="name" value="<?php echo $products[0]['name_product'] ?>">
                                    <input type="hidden" name="image" value="<?php echo $products[0]['image_product'] ?>">
                                    <input type="hidden" name="category" value="<?php echo $products[0]['category_idcategory'] ?>">
                                    <button type="submit" class="btn-aceptar">
                                        Agregar al Carrito de Compras
                                    </button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                    </div>

                    <div class="row pager">
                        <div class="col-6 ">
                            <a class="d-block h5 font-weight-normal" href="#">
                                <i class="icofont-arrow-left"></i>
                            </a>
                        </div>

                        <div class="col-6 text-right ">
                            <div class="btn-group text-right" role="group" style="justify-content: flex-end;">
                                <a class="d-block h5 font-weight-normal" href="#">
                                    <i class="icofont-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->