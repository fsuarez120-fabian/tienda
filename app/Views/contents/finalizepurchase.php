<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <br>
            <h2>Completar Compra</h2>
        </div>
        <div class="row">

            <div class="col-lg-6">
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

                                $totalProducts = 0;
                                foreach ($cart as $item) {
                                    echo
                                    '<tr>
                                        <td>' . $item['category'] . '</td>
                                        <td>' . $item['reference'] . '</td>
                                        <td>' . $item['quantity'] . '</td>
                                        <td>$' . number_format($item['price'] * $item['quantity']) . '</td>
                                    <tr>';
                                    $totalProducts = $totalProducts + $item['price'] * $item['quantity'];
                                }
                                ?>
                                <tr>
                                    <th scope="row">Total Productos</th>
                                    <td></td>
                                    <td></td>
                                    <th scope="row"><?php echo '$' . number_format($totalProducts); ?></th>
                                <tr>
                                <tr>
                                    <th scope="row">Flete</th>
                                    <td></td>
                                    <td></td>
                                    <th scope="row"><?php echo '$' . number_format($flete); ?></th>
                                <tr>
                                <tr>
                                    <td></td>
                                    <th scope="row">TOTAL</th>

                                    <td></td>
                                    <th scope="row"><?php
                                                    $total = $totalProducts + $flete;
                                                    echo '$' . number_format($total); ?></th>
                                <tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <form method="post" action=<?= $payment['url'] ?> id="formOrder">
                            <input name="merchantId" type="hidden" value="<?= $payment['merchantId'] ?>">
                            <input name="accountId" type="hidden" value="<?= $payment['accountId'] ?>">
                            <input name="description" type="hidden" value="<?= $payment['description'] ?>">
                            <input name="referenceCode" type="hidden" value="<?= $payment['referenceCode'] ?>">
                            <input name="amount" type="hidden" value="<?= $payment['amount'] ?>">
                            <input name="tax" type="hidden" value="<?= $payment['tax'] ?>">
                            <input name="taxReturnBase" type="hidden" value="<?= $payment['taxReturnBase'] ?>">
                            <input name="currency" type="hidden" value="<?= $payment['currency'] ?>">
                            <input name="signature" type="hidden" value="<?= $payment['signature'] ?>">
                            <input name="test" type="hidden" value="<?= $payment['test'] ?>">
                            <input name="buyerEmail" type="hidden" value="<?= $payment['buyerEmail'] ?>">
                            <input name="responseUrl" type="hidden" value="<?= $payment['responseUrl'] ?>">
                            <input name="confirmationUrl" type="hidden" value="<?= $payment['confirmationUrl'] ?>">
                            <input name="buyerFullName" type="hidden" value="<?= $payment['buyerFullName'] ?>">
                            <input name="payerDocument" type="hidden" value="<?= $payment['payerDocument'] ?>">
                            <input name="mobilePhone" type="hidden" value="<?= $payment['mobilePhone'] ?>">
                            <input name="payerEmail" type="hidden" value="<?= $payment['payerEmail'] ?>">
                            <input name="payerMobilePhone" type="hidden" value="<?= $payment['payerMobilePhone'] ?>">
                            <input name="payerFullName" type="hidden" value="<?= $payment['payerFullName'] ?>">
                            <button type="submit" class="btn-aceptar">
                                PAGAR
                            </button>
                        </form>

                    </div>

                    <div class="text-center">
                        <br>
                        <b>PeRa Amiguis para tu comodidad tu envi&oacute; ser&aacute; realizado por </b>
                        <img src="<?php echo base_url('pictures/peradk'); ?>/servientrega.png" alt="" class="img-fluid col-6">

                        <p><br>Trayecto nacional o zonal, tiempo de entrega de 2 a 3 días h&aacute;biles </p>
                        <p>Trayecto especial, tiempo de entrega 4 a 5 d&iacute;as h&aacute;biles</p>
                    </div>


                </div>

                <br>
            </div>

            <div class="col-lg-6">
                <div class="info">
                    <div class="table-responsive">
                        <div class="text-center">
                            <h3>Datos de env&iacute;o</h3>
                        </div>

                        <table class="table table-sm">

                            <tbody>
                                <tr>
                                    <th scope="row">Ciudad:</th>
                                    <td><?= $information['city'] . ' - ' . $information['department']; ?></td>
                                <tr>
                                <tr>
                                    <th scope="row">Direcci&oacute;n:</th>
                                    <td><?= $information['adress'] . ' Barrio ' . $information['neighborhood']; ?></td>
                                <tr>

                                <tr>
                                    <th scope="row">Cliente:</th>
                                    <td><?= $information['name'] . ' ' . $information['surname']; ?></td>
                                <tr>
                                <tr>
                                    <th scope="row"><?= $information['typeid'] . ':'; ?></th>
                                    <td><?= $information['numberid']; ?></td>
                                <tr>
                                <tr>
                                    <th scope="row">Celular:</th>
                                    <td><?= $information['numphone']; ?></td>
                                <tr>
                                <tr>
                                    <th scope="row">Correo Electr&oacute;nico::</th>
                                    <td><?= $information['email']; ?></td>
                                <tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <img src="<?= base_url('pictures/peradk') ?>/creo_en_mi_me_lo_merezco.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-3"></div>
                        </div>



                        <p>Gracias por tu compra, te PeRa queremos!!!! </p>

                    </div>


                </div>


            </div>



        </div>

    </div>
</section>