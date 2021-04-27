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
                                <h1>$ <?= $category['price_category'] ?></h1>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select name="horma" class="form-control" required>
                                        <option value="">Mujer - Hombre</option>
                                        <option value="mujer">mujer</option>
                                        <option value="hombre">hombre</option>
                                    </select>
                                    <p class="form-text text-muted">
                                        <b>Selecciona Mujer u Hombre según la horma que deseas para tus PeRa Alpargatas 🍐.</b><br>
                                      
                                    </p>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="size" required>
                                        <option value="">Talla </option>
                                        <?php
                                        foreach($sizes as $size){
                                            echo "<option value='{$size['size_idsize']}'>{$size['size_idsize']}</option>";
                                        }
                                        ?>
                                        
                                        
                                    </select>
                                    <p class="form-text text-muted">
                                        <b>Pera amiguis pide la talla que más utilices en calzado nacional <img src="<?= base_url().route_to('images_peradk') ?>/colombia.svg" alt="" style="width: 20px;"> y te quedaran perfectas.</b>
                                    </p>
                                    <select type="text" name="observation" class="form-control" required>
                                        <option value="sin observacion">Sin observacion</option>
                                        <option value="pie delgado">Pie Delgado</option>
                                        <option value="+empeine">con empeine</option>´´
                                        <option value="++empeine">con bastante empeine</option>
                                    </select>
                                    <p class="form-text text-muted">
                                        <b>Si tu pie es ancho ten en cuenta estas observaciones</b><br>
                                        +empeine = 0.5 centimetros más ancho<br>
                                        ++empeine = 1 centimetros más ancho
                                    </p>
                                </div>

                            </div>
                            <select class="form-control" name="quantity" required>
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
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <input type="hidden" name="reference" value="<?= $products[0]['reference'] ?>">
                                <input type="hidden" name="r" value="addproduct">
                                <input type="hidden" name="name" value="<?= $products[0]['name_product'] ?>">
                                <input type="hidden" name="image" value="<?= $products[0]['image_product'] ?>">
                                <input type="hidden" name="category" value="<?= $products[0]['category_idcategory'] ?>">
                                <button type="submit" class="btn-aceptar">
                                    Agregar al Carrito de Compras
                                </button><br>
                            </div>
                        </div>
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