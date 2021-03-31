<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <br>

        <div class="row">

            <div class="col-lg-3">

            </div>

            <div class="col-lg-6">
                <div class="info">
                    <img src="<?= base_url() . route_to('images_peradk') ?>/encabezadofinish.png" alt="" class="img-fluid">
                    <br>
                    <br>
                    
                    <table>
                        <tr>
                            <td><b>Estado de la transacci&oacute;n:</b></td>
                            <td><?= $estadoTx ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td><b>ID de la transacci&oacute;n:</b></td>
                            <td><?= $transactionId ?></td>
                        </tr>
                        <tr>
                            <td><b>Referencia de la venta:</b></td>
                            <td><?= $reference_pol ?></td>
                        </tr>
                        <tr>
                            <td><b>Referencia de la transacci&oacute;n:</b></td>
                            <td><?= $referenceCode ?></td>
                        </tr>
                        <tr>
                            <?php if ($pseBank != null) {
                            ?>
                        <tr>
                            <td><b>cus:</b></td>
                            <td><?= $cus ?></td>
                        </tr>
                        <tr>
                            <td><b>Banco:</b></td>
                            <td><?= $pseBank ?> </td>
                        </tr><?php } ?>
                    <tr>
                        <td><b>Valor total:</b></td>
                        <td>$<?= number_format($TX_VALUE) ?></td>
                    </tr>
                    <tr>
                        <td><b>Moneda:</b></td>
                        <td><?= $currency ?></td>
                    </tr>
                    <tr>
                        <td><b>Descripción:</b></td>
                        <td><?= ($extra1) ?></td>
                    </tr>
                    <tr>
                        <td><b>Entidad:</b></td>
                        <td><?= ($lapPaymentMethod) ?></td>
                    </tr>
                    </table>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <img src="<?= base_url('public/pictures/peradk') ?>/twologo.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <p>Gracias por tu compra, te PeRa queremos!!!! </p>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">

            </div>


        </div>

    </div>
</section>