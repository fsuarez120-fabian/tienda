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
                                    <select class="form-control" name="size" required>
                                        <option value="">Talla </option>
                                        <?php
                                        foreach ($sizes as $size) {
                                            echo '<option value="'.$size['size_idsize'].'">'.$size['size_idsize'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="form-text text-muted">
                                        <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src="<?= base_url().route_to('images_peradk') ?>/colombia.svg" alt="" style="width: 20px;">.</b>
                                    </p>
                                    <input type="hidden" name="observation" value="">

                                </div>
                                <div class="col">
                                    <select name="horma" class="form-control" required>
                                        <option value="">Mujer - Hombre</option>
                                        <option value="mujer">mujer</option>
                                        <option value="hombre">hombre</option>
                                    </select>
                                    <p class="form-text text-muted">
                                        <b>Horma para Hombre y Mujer 🍐</b><br>

                                    </p>
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