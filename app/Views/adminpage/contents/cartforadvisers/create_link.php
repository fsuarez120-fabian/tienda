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
                        <h2>Carrito de Compras</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <?php

                            if (count($cart) <= 0) {
                                echo "<h1>TU CARRITO EST&Aacute; MUY VAC&Iacute;O</h1>";
                            }

                            foreach ($cart as $item) {
                            ?>
                                <div class="member d-flex align-items-start aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="pic">
                                        <img src="<?= base_url() . route_to('images_products_miniaturas') . '/' . $item['image']  ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info col">
                                        <h4> <?php echo $item['name'] . '<span>Ref:' . $item['reference'] ?></span></h4>
                                        <p><b>Tipo:</b><?php echo ' ' . $item['category'] ?></p>
                                        <p><b>Talla:</b><?php echo ' ' . $item['size'] ?></p>
                                        <p><b>Cantidad:</b><?php echo ' ' . $item['quantity'] ?></p>
                                        <p><b>Horma:</b><?php echo ' ' . $item['horma'] ?></p>
                                        <p><b>Observaci&oacute;n:</b><?php echo ' ' . $item['observation'] ?></p>

                                    </div>
                                    <div class="col">
                                        <p><b>Precio: <br>$ </b><?php echo number_format($item['quantity'] * $item['price']) ?></p>
                                    </div>
                                    <div>
                                        <div class="delete">
                                            <form action="<?= base_url() . route_to('deleteitemcart') ?>" method="POST">
                                                <input type="hidden" name="reference" value="<?= $item['reference'] ?>">
                                                <input type="hidden" name="category" value="<?= $item['idcategory'] ?>">
                                                <input type="hidden" name="observation" value="<?= $item['observation'] ?>">
                                                <input type="hidden" name="size" value="<?= $item['size'] ?>">
                                                <input type="hidden" name="horma" value="<?= $item['horma'] ?>">
                                                <button type="submit" value="">
                                                    <i class="icofont-close-circled"></i>
                                                </button>

                                            </form>
                                        </div>

                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                            <div class="text-center">

                                <form action="<?= base_url('/#about') ?>" method="get">
                                    <input type="hidden" name="enabelmodal" value="1">
                                    <button type="submit" class="btn-aceptar">
                                        SEGUIR AÑADIENDO PRODUCTOS
                                    </button>
                                </form>

                            </div>
                            <br>
                        </div>
                        <div class="col-lg-5">
                            <div class="info">
                                <div class="table-responsive">
                                    <div class="text-center">
                                        <h3>RESUMEN DEL PEDIDO</h3>
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">PROD</th>
                                                <th scope="col">REF</th>
                                                <th scope="col">CAN</th>
                                                <th scope="col">VALOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $total = 0;
                                            foreach ($cart as $item) {
                                                echo '<tr>
                                                    <td>' . $item['category'] . '</td>
                                                    <td>' . $item['reference'] . '</td>
                                                    <td>' . $item['quantity'] . '</td>
                                                    <td>$' . number_format($item['price'] * $item['quantity']) . '</td>
                                                <tr>';
                                                $total = $total + $item['price'] * $item['quantity'];
                                            }
                                            ?>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td></td>
                                                <td></td>
                                                <th scope="row"><?php echo '$' . number_format($total); ?></th>
                                            <tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url() . route_to('admin_page_create_link'); ?>">
                                        <input type="hidden" name="department" value="5">
                                        <button type="submit" class="btn-aceptar">
                                            GENERAR LINK
                                        </button>
                                    </a>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->
</div>