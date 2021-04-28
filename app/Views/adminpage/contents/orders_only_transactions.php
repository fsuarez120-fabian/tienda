<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PEDIDOS E-COMMERCE CON ESTADO FINAL Y TRANSACCIÓN</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pedidos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">


                    <?php
                    if (count($orders) < 1) {
                        echo '
                        <div class="callout callout-success">
                        <h5>HO HAY PEDIDOS</h5>
      
                        <p>Lo sentimos en este dia no hay pedidos con estado final.</p>
                      </div>';
                    }
                    foreach ($orders as $order) {
                        //d($order);
                    ?>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">
                                Estado Pedido:
                                <?php switch ($order['state_order']) {
                                    case 'PENDING':
                                        echo '<span class="badge bg-warning">PENDING</span>';
                                        break;
                                    case 'APPROVED':
                                        echo '<span class="badge bg-success">APROBADA</span>';
                                        break;
                                    case 'DECLINED':
                                        echo '<span class="badge bg-danger">DECLINADA</span>';
                                        break;
                                    case 'EXPIRED':
                                        echo '<span class="badge bg-danger">EXPIRADA</span>';
                                        break;
                                    case 'DISABLED':
                                        echo '<span class="badge bg-primary">DESHABILITADA</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-danger">' . $order['state_order'] . '</span>';
                                        break;
                                } ?>
                                <br>
                                Consecutivo: <?= $order['consecutive_order'] ?>
                                <br>
                                Referencia: <?= $order['shippinginfo_idshipinfo'] ?>
                            </a>
                            <div class="list-group-item list-group-item-action">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card">
                                            <h5 class="card-header">
                                                <?= $order['name_shippinginfo'] . ' ' . $order['surname_shippinginfo'] ?><br>
                                                <b><?= $order['typeid_shippinginfo'] ?>: </b><?= $order['number_id_shippinginfo'] ?>
                                            </h5>
                                            <div class="card-body">
                                                <p class="card-text">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Ciudad:</th>
                                                                <td><?= $order['destination']['city'] . ' - ' . $order['destination']['department'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Dirección:</th>
                                                                <td><?= $order['address_shippinginfo'] . ' Barrio ' . $order['neighborhood_shippinginfo'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Celular:</th>
                                                                <td><?= $order['number_phone_shippinginfo'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Correo Electrónico::</th>
                                                                <td><?= $order['email_shippinginfo'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>


                                                </p>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Ref
                                                        </th>
                                                        <th>
                                                            Producto
                                                        </th>
                                                        <th>
                                                            Talla
                                                        </th>
                                                        <th>
                                                            Observación
                                                        </th>
                                                        <th>
                                                            Horma
                                                        </th>
                                                        <th>
                                                            Cantidad
                                                        </th>
                                                        <th>
                                                            Precio
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($order['products'] as $product) { ?>
                                                        <tr class="table-success">
                                                            <td>
                                                                <?= $product['product_reference'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $product['name_category'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $product['size_idsize'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $product['observation_orderdetails'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $product['horma_orderdetails'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $product['quantity_orderdetails'] ?>
                                                            </td>
                                                            <td>
                                                                <?= '$ ' . number_format($product['unit_price_orderdetails']) ?>
                                                            </td>

                                                        </tr>

                                                    <?php } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>Flete</b></td>
                                                        <td><?= '$ ' . number_format($order['freight_price_order']) ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><b>TOTAL</b></td>
                                                        <td><?= '$ ' . number_format($order['total_price_order']) ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($permission_transactions) :
                                ?>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-success table-sm">
                                                <thead>
                                                    <tr>

                                                        <th>Id Transacci&oacute;n</th>
                                                        <th style="width: 40px">Estado</th>
                                                        <th>Ref Pay U</th>
                                                        <th>Valor</th>
                                                        <th>Fecha</th>
                                                        <th>Cus</th>
                                                        <th>pse_bank</th>
                                                        <th>Mensaje de respuesta</th>
                                                        <th>Id Metodo de pago</th>
                                                        <th>Metodo de pago</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($order['transactions']) {
                                                        foreach ($order['transactions'] as $transaction) { ?>
                                                            <tr>
                                                                <td><?= $transaction['idtransaction'] ?></td>
                                                                <td>
                                                                    <?php switch ($transaction['state_pol']) {
                                                                        case 4:
                                                                            echo '<span class="badge bg-success">APROVADA</span>';
                                                                            break;
                                                                        case 6:
                                                                            echo '<span class="badge bg-danger">DECLINADA</span>';
                                                                            break;
                                                                        case 5:
                                                                            echo '<span class="badge bg-danger">EXPIRADA</span>';
                                                                            break;
                                                                        default:
                                                                            echo '<span class="badge bg-danger">' . $transaction['state_pol'] . '</span>';
                                                                            break;
                                                                    } ?>
                                                                </td>
                                                                <td><?= $transaction['reference_pol'] ?></td>
                                                                <td><?= $transaction['value'] ?></td>
                                                                <td><?= $transaction['transaction_date'] ?></td>
                                                                <td><?= $transaction['cus'] ?></td>
                                                                <td><?= $transaction['pse_bank'] ?></td>
                                                                <td><?= $transaction['response_message_pol'] ?></td>
                                                                <td><?= $transaction['payment_method_id'] ?></td>
                                                                <td><?= $transaction['payment_method_name'] ?></td>
                                                            </tr>
                                                    <?php }
                                                    } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php
                                endif;
                                ?>

                            </div>
                        </div>
                        <br>
                    <?php } ?>


                </div>
                <div class="col-md-2">
                    <form action="<?= base_url() . route_to('admin_page_orders_with_state_final') ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Fecha
                            </label>
                            <input type="date" class="form-control" name="date" value="<?= $date ?>" />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Ver pedidos de la fecha
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>