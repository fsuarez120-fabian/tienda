<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de links</li>
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
                        <h2>Links</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de links creador por <b><?= $cedula ?></b></h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <form action="<?= base_url().route_to('admin_page_view_list_link') ?>" method="get">
                                                <input type="number" name="id_identification" class="form-control float-right" placeholder="Cedula">
                                                <button type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Consecutivo</th>
                                                <th>ID</th>
                                                <th>Url Link</th>
                                                <th>Referencia</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listlinks as $link) :
                                            ?>

                                                <tr>
                                                    <td><?= $link['consecutive_order'] ?></td>
                                                    <td><?= $link['id_link'] ?></td>
                                                    <td><a target="”_blank”" href="<?= $link['url_link'] ?>"><?= $link['url_link'] ?></a></td>
                                                    <td><?= $link['order_link'] ?></td>
                                                    <td><?= $link['date_link'] ?></td>
                                                    <td><?= $link['hour_link'] ?></td>
                                                    <td><?= $link['total_price_order'] ?></td>
                                                    <td>
                                                        <?php switch ($link['state_order']) {
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
                                                            default:
                                                                echo '<span class="badge bg-danger">' . $transaction['state_pol'] . '</span>';
                                                                break;
                                                        } ?>
                                                    </td>

                                                </tr>

                                            <?php
                                            endforeach;
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->
</div>