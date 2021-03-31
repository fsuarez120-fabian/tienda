<div class="container-fluid backgroudlogin">
    <div class="row">
        <div class="col-md-5">
        </div>

        <div class="col-md-2 caja-login">
            <h3>Iniciar Sesión</h3>
            <br>
            <form method="post" action="<?= base_url(route_to('admin_page_check_login')) ?>">
                <?php if (session('msg')) : ?>
                    <div class="alert alert-danger"> 
                        <?= session('msg.body') ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Usuario:
                    </label>
                    <input type="text" class="form-control" name="user" value="<?= old('user') ?>" />
                    <p class="is-danger"><?= session('errors.user') ?></p>
                </div>
                <div class="form-group">

                    <label for="exampleInputPassword1">
                        Contraseña:
                    </label>
                    <input type="password" class="form-control" name="password" />
                    <p class="is-danger"><?= session('errors.password') ?></p>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Entrar
                    </button>
                </div>

            </form>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>