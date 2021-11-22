<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Generador de codigos para sorteo de la moto</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="<?= base_url() . route_to('create_codigos') ?>">
                        <div class="form-group">
                            <label>
                                Cedula Cliente <a style = "color:red;">recuerde SIN puntos ni caracter especiales</a>
                            </label>
                            <input name="identificacion" value="<?= old('identificacion') ?>" type="text" class="form-control" placeholder="Identificación" />
                            <p style="color: red;"><?= session('errors.identificacion') ?></p>
                        </div>
                        <div class="form-group">
                            <label>
                                Total del pedido <a style = "color:red;">recuerde SIN FLETE</a>
                            </label>
                            <input name="cantidad" value="<?= old('cantidad') ?>" type="number" class="form-control" placeholder="$ recuerde SIN FLETE" />
                            <p style="color: red;"><?= session('errors.cantidad') ?></p>
                        </div>
                        <div class="form-group">
                            <label>
                                Linea Telefonica
                            </label>
                            <input name="numero" value="<?= old('numero') ?>" type="text" class="form-control" placeholder="Telefono" />
                            <p style="color: red;"><?= session('errors.numero') ?></p>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Generar
                        </button>
                    </form>
                </div>
                <div class="col-md-8">
                    <?php if (session('msg')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Alerta!</h5>
                            <?= session('msg.body') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Codigos Generados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Codigo</th>
                                        <th>Cedula Cliente</th>
                                        <th>Telefono</th>
                                        <th>Creado</th>
                                        <th>Activo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 0;
                                    foreach ($codes as $code) :
                                        $num += 1;
                                    ?>
                                        <tr>
                                            <td><?= $num ?></td>
                                            <td><b><?= $code['codigo_codigo'] ?></b></td>
                                            <td><?= $code['cliente_codigo'] ?></td>
                                            <td><?= $code['phone_codigo'] ?></td>
                                            <td><?= $code['created_at_codigo'] ?></td>
                                            <td>
                                                <?php if ($code['active'] == true) : ?>
                                                    <span class="badge bg-success">Activo</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Inactivo</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>