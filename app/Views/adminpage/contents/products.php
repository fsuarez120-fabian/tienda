<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PRODUCTOS - <?= $category['name_category'] ?></h1>
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
                    <form method="get" action="<?= base_url() . route_to('admin_page_products') ?>">
                        <div class="form-group">

                            <label>
                                Categoría
                            </label>
                            <select class="form-control" name="idcategory">
                                <option value="<?= $category['idcategory'] ?>" selected><?= $category['name_category']  ?></option>
                                <?php foreach ($allcategories as $cat) {
                                    if ($cat['idcategory'] != $category['idcategory']) {
                                ?>
                                        <option value="<?= $cat['idcategory'] ?>"><?= $cat['name_category']  ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">
                            Mostrar
                        </button>
                    </form>
                    <form action="<?= base_url() . route_to('admin_page_save_product') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tipo" value="<?= $category['idcategory'] ?>">
                        <div class="form-group">
                            <br>
                            <label>
                                CREAR NUEVO PRODUCTO
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
                                Imagen del producto
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
                                <th>
                                    Orden PaginaWeb
                                </th>
                                <th style="width: 200px;">
                                    Nombre
                                </th>
                                <th>
                                    Categor&iacute;a
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
                                            <img src="<?= base_url() . route_to('images_products_miniaturas') . '/' . $product['image_product'] ?>" alt="ne" class="img-fluid prodimg">
                                        </td>
                                        <td>
                                            <input type="hidden" name="reference" value="<?= $product['reference'] ?>">
                                            <?= $product['reference'] ?>
                                        </td>
                                        <td><?= $product['score_product'] ?></td>
                                        <td>
                                            <input name="nameproduct" type="text" class="form-control" value="<?= $product['name_product'] ?>" />
                                        </td>
                                        <td>
                                            <input type="hidden" name="idcategory" value="<?= $product['category_idcategory'] ?>">
                                            <?= $product['category_idcategory'] ?>
                                        </td>
                                        <td>
                                            <input name="activeproduct" type="text" class="form-control" value="<?= $product['active_product'] ?>" />
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