<main id="main">
    <!-- ======= Iniciar Sesion Section ======= -->
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            </div>
            <form action="<?= base_url() . route_to('add_to_cart_family') ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="text-center">
                                        <img class="customimage img-fluid" src="<?php echo base_url() . route_to('images_products') . '/' . $product1['image_product']  ?>" alt="Imagen no encontrada">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="text-right">
                                        <br>
                                        <h3> <?php echo 'Ref: ' . $reference ?></h3>
                                        <h1>$ <?= number_format($category1['price_category']) ?></h1>
                                    </div>
                                    <select name="quantityproduct1" class="form-control" required>
                                        <option value="">Cantidad *</option>
                                        <option value="0">0 (Si solo deseas pantalonetas)</option>
                                        <option value="1">1</option>
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
                                    <p class="text-danger"> <?= session('validate.quantityproduct1') ?></p>
                                    <p class="form-text text-muted">
                                        <b>Escoja la cantidad de PeRa productos que deseas 🍐.</b><br>
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <?php
                                            if (count($sizes1) >= 1) {
                                                echo ' <select name="sizeproduct1" class="form-control"><option value="">Talla</option>';
                                                foreach ($sizes1 as $size) {
                                                    echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                                                }
                                                echo ' </select><p class="form-text text-muted"><b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src="https://localhost/tienda/public/pictures/peradk/colombia.svg" alt="" style="width: 20px;">. Recuerda que lo puedes usar como prenda casual o traje de baño. <br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.</p>';
                                            }
                                            ?>
                                            <p class="text-danger"> <?= session('validate.sizeproduct1') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="text-center">
                                        <img class="customimage img-fluid" src="<?php echo base_url() . route_to('images_products') . '/' . $product2['image_product']  ?>" alt="Imagen no encontrada">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="text-right">
                                        <br>
                                        <h3> <?php echo 'Ref: ' . $reference ?></h3>
                                        <h1>$ <?= number_format($category2['price_category']) ?></h1>
                                    </div>
                                    <select name="quantityproduct2" class="form-control" required>
                                        <option value="">Cantidad *</option>
                                        <option value="0">0 (Si solo deseas Bodys manga Sisa)</option>
                                        <option value="1">1</option>
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
                                    <p class="text-danger"> <?= session('validate.quantityproduct2') ?></p>
                                    <p class="form-text text-muted">
                                        <b>Escoja la cantidad de PeRa productos que deseas 🍐.</b><br>
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <?php

                                            if (count($sizes2) >= 1) {
                                                echo ' <select name="sizeproduct2" class="form-control"><option value="">Talla</option>';
                                                foreach ($sizes2 as $size) {
                                                    echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                                                }
                                                echo ' </select><p class="form-text text-muted">
                                                <b>Pide la talla que más utilices en Jeans Nacional <img src="' . base_url() . '/public/pictures/peradk/colombia.svg" alt="" style="width: 20px;">.</b></p>
                                                ';
                                            }
                                            ?>
                                            <p class="text-danger"> <?= session('validate.sizeproduct2') ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="text-center">
                            <input type="hidden" name="reference" value="<?= $reference ?>">
                            <input type="hidden" name="nameproduct1" value="<?= $product1['name_product'] ?>">
                            <input type="hidden" name="nameproduct2" value="<?= $product2['name_product'] ?>">
                            <input type="hidden" name="imageproduct1" value="<?= $product1['image_product'] ?>">
                            <input type="hidden" name="imageproduct2" value="<?= $product2['image_product'] ?>">
                            <input type="hidden" name="categoryproduct1" value="<?= $product1['category_idcategory'] ?>">
                            <input type="hidden" name="categoryproduct2" value="<?= $product2['category_idcategory'] ?>">
                            <button type="submit" class="btn-aceptar">
                                Agregar al Carrito de Compras
                            </button><br>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->