<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <br>
            <h2>Carrito de Compras</h2>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="col-lg-12">
                    <?php
                    $total = 0;
                    //dd($listproducts);
                    foreach ($listproducts as $item) {
                        $total = $total + $item['unit_price_orderdetails'] * $item['quantity_orderdetails'];
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">TOTAL DE LA COMPRA</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"><?php echo '$' . number_format($total); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <?php

                if (count($listproducts) <= 0) {
                    echo "<h1>TU CARRITO EST&Aacute; MUY VAC&Iacute;O</h1>";
                }

                foreach ($listproducts as $item) {

                ?>
                    <div class="member d-flex align-items-start aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pic">
                            <img src="<?= base_url() . route_to('images_products_miniaturas') . '/' . $item['image_product']  ?>" class="img-fluid" alt="">
                        </div>
                        <div class="member-info col">
                            <h4> <?php echo $item['name_product'] . '<span>Ref:' . $item['product_reference'] ?></span></h4>
                            <p><b>Tipo:</b><?php echo ' ' . $item['name_category'] ?></p>
                            <p><b>Talla:</b><?php echo ' ' . $item['size_idsize'] ?></p>
                            <p><b>Cantidad:</b><?php echo ' ' . $item['quantity_orderdetails'] ?></p>
                            <p><b>Horma:</b><?php echo ' ' . $item['horma_orderdetails'] ?></p>
                            <p><b>Observaci&oacute;n:</b><?php echo ' ' . $item['observation_orderdetails'] ?></p>

                        </div>
                        <div class="col">
                            <p><b>Precio: <br>$ </b><?php echo number_format($item['quantity_orderdetails'] * $item['unit_price_orderdetails']) ?></p>
                        </div>

                    </div>

                <?php
                }
                ?>

                <div class="text-center">
                    <br>
                    <b>PeRa Amiguis para tu comodidad tu env&iacute;o ser&aacute; despachado por</b>
                    <img src="<?php echo base_url('public/pictures/peradk'); ?>/servientrega.png" alt="" class="img-fluid col-7">

                    <p><br>Trayecto nacional o zonal, tiempo de entrega de 2 a 3 días h&aacute;biles </p>
                    <p>Trayecto especial, tiempo de entrega 4 a 5 d&iacute;as h&aacute;biles</p>
                </div>


            </div>

            <div class="col-lg-5">


                <?php
                if (count($listproducts) > 0) :
                ?>

                    <div class="info">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                if (count($transactions) > 0) {
                                    foreach ($transactions as $trans) {
                                        echo '<h1>ESTADO:</h1>';
                                        if ($trans['state_pol'] == 4) {
                                            echo '<h3>Pedido Aprobado</h3>';
                                        } else if ($trans['state_pol'] == 6) {
                                            echo '<h3>Pedido con Transacción Rechazada</h3>';
                                        } else if ($trans['state_pol'] == 7) {
                                            echo '<h3>Pedido Pendiente</h3>';
                                        } else if ($trans['state_pol'] == 104) {
                                            echo '<h3>Transaccion en Error</h3>';
                                        } else if ($trans['state_pol'] == 5) {
                                            echo '<h3>Pedido Expirado</h3>';
                                        }
                                    }
                                } else {
                                ?>
                                    <h3>Datos de Env&iacute;o</h3>
                                    <br>

                                    <form action="<?= base_url() . route_to('save_shipping_information_cart_advisers') ?>" method="post">
                                        <input type="hidden" name="reference" value="<?= $reference ?>">
                                        <div class="row">
                                            <div class="input-group mb-3">
                                                <i class="icofont-direction-sign"></i>
                                                <select class="custom-select" id="department" name="department" required>
                                                    <option value="">* Departamento</option>
                                                    <?php
                                                    foreach ($departments as $depart) {
                                                        echo  '<option value="' . utf8_decode($depart['iddepartment']) . '">' . utf8_decode($depart['name_department']) . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                                <div id="cities">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group">
                                                <i class="icofont-direction-sign"></i>

                                                <input value="" placeholder="* Dirección" type="text" name="adress" class="form-control" required>
                                                <input value="" placeholder="* Barrio" type="text" name="neighborhood" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">

                                            <div class="input-group">
                                                <i class="icofont-ui-user"></i>

                                                <input value="" name="name" placeholder="* Nombres" type="text" class="form-control" required>
                                                <input value="" name="surname" placeholder="* Apellidos" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="input-group mb-3">
                                                <i class="icofont-id"></i>


                                                <select name="typeid" class="custom-select" id="inputGroupSelect01" required>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="NIT">NIT</option>
                                                </select>
                                                <input value="" name="numberid" placeholder="* Número" type="number" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group mb-3">
                                                <i class="icofont-brand-whatsapp"></i>
                                                <input value="" placeholder="* Celular" type="number" name="numphone" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group mb-3">
                                                <i class="icofont-ui-email"></i>
                                                <input value="" placeholder="* Email" type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit">CONFIRMAR</button>
                                            <br>
                                        </div>
                                    </form>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>