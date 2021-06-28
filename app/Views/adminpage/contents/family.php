<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PRODUCTOS FAMILIA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if (session('msg')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> <?= session('msg.title') ?></h5>
                    <?= session('msg.body') ?>
                </div>
            <?php endif; ?>
            <?php if (session('error')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> <?= session('error.title') ?></h5>
                    <?= session('error.body') ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-3">

                    <form action="<?= base_url() . route_to('save_family_new_reference') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <br>
                            <label>
                                CREAR REF DE FAMILIA
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Referencia
                            </label>
                            <input type="number" class="form-control" name="reference" required />
                        </div>
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input type="text" class="form-control" name="nombre" required />
                        </div>
                        <div class="form-group">
                            <label>
                                Imagen del familia
                            </label>
                            <input type="file" class="form-control-file" name="archivo" required />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Crear
                        </button>
                    </form>

                </div>
                <div class="col-md-9 table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Imagen
                                </th>
                                <th>
                                    Referencia
                                </th>
                                <th style="width: 200px;">
                                    Nombre
                                </th>
                                <th>
                                    Activo
                                </th>

                                <th>
                                    Acci&oacute;n
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($products as $product) {
                                //d($product); 
                            ?>
                                <form action="<?= base_url() . route_to('admin_page_update_item_products') ?>" method="post">
                                    <tr>

                                        <td>
                                            <img src="<?= base_url('public/pictures/group_products/thumbnails')  . '/' . $product['image_reference_group'] ?>" alt="ne" class="img-fluid prodimg">
                                        </td>
                                        <td>

                                            <?= $product['id_reference_group'] ?>
                                        </td>
                                        <td>
                                            <?= $product['name_reference_group'] ?>
                                        </td>

                                        <td>

                                            <input name="activeproduct" type="text" class="form-control" value="<?= $product['active_reference_group'] ?>" />

                                        </td>
                                        <td>
                                            <button type="submit" style="border-color: transparent; background: transparent;">
                                                <i class="far fa-save action-product icon-green"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </form>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>