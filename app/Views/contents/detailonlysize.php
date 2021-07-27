<main id="main">
    <!-- ======= Iniciar Sesion Section ======= -->
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            </div>
            <div class="info">
                <form action="<?php echo base_url() . route_to('cart'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <img class="customimage img-fluid" src="<?php echo base_url() . route_to('images_products') . '/' . $products[0]['image_product']  ?>" alt="Imagen no encontrada">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="text-right">
                                <br>
                                <h3> <?php echo 'Ref: ' . $products[0]['reference'] ?></h3>
                                <h1>$ <?= number_format($category[0]['price_category']) ?></h1>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <?php
                                    if (count($sizes) >= 1) {
                                        if ($category[0]['idcategory'] == 2) {
                                            if ($products[0]['reference'] == 1004) {
                                                echo ' <select name="size" class="form-control" required>
                                                <option value="">Talla</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                ';
                                            } else {
                                                echo ' <select name="size" class="form-control" required>
                                                <option value="">Talla</option>';
                                                foreach ($sizes as $size) {
                                                    echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                                                }
                                            }
                                        } else if ($category[0]['idcategory'] == 4 || $category[0]['idcategory'] == 3) {
                                            if ($products[0]['reference'] == 262) {
                                                echo ' <select name="size" class="form-control" required>
                                                <option value="">Talla</option>
                                                <option value="XS">XS</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                                ';
                                                $messegesize = '<p class="form-text text-muted">
                                                <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">. Recuerda que lo puedes usar como prenda casual o traje de baño.
                                                <br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
                                                <br><b>Talla para adulto </b>(XS a la XXXL).';
                                            } else {
                                                echo ' <select name="size" class="form-control" required>
                                                <option value="">Talla</option>';
                                                foreach ($sizes as $size) {
                                                    echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                                                }
                                            }
                                        } else {
                                            echo ' <select name="size" class="form-control" required>
                                                <option value="">Talla</option>';
                                            foreach ($sizes as $size) {
                                                echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                                            }
                                        }
                                        echo ' </select>';
                                        echo $messegesize;
                                    } else {

                                        if ($category[0]['idcategory'] == 10) {
                                            echo ' <select name="size" class="form-control" required>
                                            <option value="">Tallas Disponibles</option>';
                                            switch ($products[0]['reference']) {
                                                case 8:
                                                    echo  '
                                                    <option value="4">4</option>
                                                    <option value="6">6</option>
                                                            <option value="8">8</option>
                                                            <option value="10">10</option>
                                                            <option value="12">12</option>
                                                            <option value="14">14</option>
                                                            <option value="16">16</option>
                                                    ';
                                                    break;


                                                case 5:
                                                    echo  '<option value="28">28</option>
                                                            <option value="30">30</option>
                                                            <option value="32">32</option>
                                                            <option value="34">34</option>
                                                            <option value="36">36</option>
                                                            <option value="38">38</option>
                                                    ';
                                                    break;

                                                case 4:
                                                    echo  ' <option value="30">30</option>
                                                            <option value="34">34</option>
                                                            <option value="38">38</option>
                                                    ';
                                                    break;
                                                default:
                                                    echo
                                                    '
                                                    <option value="4">4</option>
                                                    <option value="6">6</option>
                                                            <option value="8">8</option>
                                                            <option value="10">10</option>
                                                            <option value="12">12</option>
                                                            <option value="14">14</option>
                                                            <option value="16">16</option>
                                                            ';
                                                    break;
                                            }
                                            echo ' </select>';
                                            echo $messegesize;
                                        } else {
                                            echo '<input type="hidden" name="size" value="">';
                                        }
                                    }

                                    ?>


                                    <?php

                                    if (count($observations) > 1) {
                                        if ($category[0]['idcategory'] == 9) {
                                            if ($products[0]['reference'] == 260 || $products[0]['reference'] == 262 || $products[0]['reference'] == 281) {
                                                echo '
                                                <select type="text" name="observation" class="form-control" required>
                                                    <option value="">Tipo [adulto - niño] Esta referencia solo está en adulto</option>
                                                    <option value="adulto">Adulto</option>
                                                </select>
                                                <p class="form-text text-muted">
                                                    <b>Escoge el tipo de Leggings que deseas.</b><br>	
                                                </p>
                                                ';
                                            } else {
                                                echo '<select type="text" name="observation" class="form-control" required>';
                                                foreach ($observations as $observation) {
                                                    echo  '<option value="' . $observation[0] . '">' . $observation[1] . '</option>';
                                                }
                                                echo '</select>';
                                                echo $messegeobservation;
                                            }
                                        } else {
                                            echo '<select type="text" name="observation" class="form-control" required>';
                                            foreach ($observations as $observation) {
                                                echo  '<option value="' . $observation[0] . '">' . $observation[1] . '</option>';
                                            }
                                            echo '</select>';
                                            echo $messegeobservation;
                                        }
                                    } else {
                                        echo '<input type="hidden" name="observation" value="">';
                                    }
                                    if ($category[0]['idcategory'] == 2) {
                                        if ($products[0]['reference'] == 1004) {
                                            echo '<input type="hidden" name="horma" value="hombre">';
                                        } else {
                                            echo '<input type="hidden" name="horma" value="mujer">';
                                        }
                                    } else if ($category[0]['idcategory'] == 23) {
                                        echo '<select name="horma" class="form-control" required>
                                            <option value="">Tipo[Niño - Niña]</option>
                                            <option value="nino">Niño</option>
                                            <option value="nina">Niña</option>
                                            </select>
                                            <p class="form-text text-muted">
                                            <b>Horma para Niño y Niña 🍐</b><br>

                                            </p>';
                                    } else {
                                        echo '<input type="hidden" name="horma" value="">';
                                    }
                                    ?>

                                </div>

                            </div>
                            <select name="quantity" class="form-control" required>
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
                            <p class="form-text text-muted">
                                <b>Escoja la cantidad de PeRa productos que deseas 🍐.</b><br>
                                <?php
                                if ($category[0]['idcategory'] == 6) {
                                    echo "Lleva 1 PeRa Rizos más flete de envío. A partir de 2 unidades el envío es GRATIS.";
                                }
                                ?>
                            </p>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    <div class="col-10">
                                        <div class="text-center">
                                            <input type="hidden" name="reference" value="<?php echo $products[0]['reference'] ?>">
                                            <input type="hidden" name="r" value="addproduct">
                                            <input type="hidden" name="name" value="<?php echo $products[0]['name_product'] ?>">
                                            <input type="hidden" name="image" value="<?= $products[0]['image_product'] ?>">
                                            <input type="hidden" name="category" value="<?= $products[0]['category_idcategory'] ?>">

                                            <button type="submit" class="btn-aceptar">
                                                Agregar al Carrito de Compras
                                            </button><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1"></div>

                            </div>

                        </div>
                    </div>
                    <br>

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