<section id="hero" class="d-flex align-items-center">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                <img src="<?= base_url() ?>/public/pictures/peradk/peramoto.png" class="img-fluid animated" alt="">
                <br>
                <br>
            </div>
            <div class="col-lg-6 order-1 order-lg-1 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <h1>PERA SORTEO!!!</h1>
                <h2>Ganate una hermosa Moto, para que puedas ir a llevar felicidad a cada uno de los hogares colombianos. </h2>



                <form method="POST" action="<?= base_url() . route_to('form_sorteo') ?>">

                    <?php if (session()->errors) { ?>

                        <div class="alert alert-danger" role="alert">

                            <?= session()->errors ?>

                        </div>

                    <?php } ?>

                    <?php if (session()->msg) { ?>

                        <div class="alert alert-success" role="alert">

                            <?= session()->msg ?>

                        </div>

                    <?php } ?>



                    <div class="form-group">

                        <label class="label-sorteo">

                            Código del Pedido

                        </label>

                        <input name="id" type="text" class="form-control" value="<?= old('id') ?>" placeholder="Codigo Pedido" />

                        <p class="text-danger"><?= session('validate.id') ?></p>

                    </div>



                    <div class="form-group">

                        <label class="label-sorteo">

                            Email

                        </label>

                        <input name="email" type="email" class="form-control" value="<?= old('email') ?>" placeholder="E-mail" />

                        <p class="text-danger"><?= session('validate.email') ?></p>

                    </div>

                    <div class="checkbox">

                        <label>

                            <input type="checkbox" name="term" required /> Acepto los <a href="#">terminos y condiciones</a> del sorteo.

                        </label>

                        <p class="text-danger"><?= session('validate.term') ?></p>

                    </div>

                    <div class="text-center">

                        <button type="submit" class="btn btn-primary">

                            PARTICIPAR

                        </button>

                        <a href="https://www.youtube.com/watch?v=BIrhmzL_bdA" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true">Ver Video <i class="icofont-play-alt-2"></i></a>

                    </div>

                </form>
            </div>

        </div>

    </div>

</section>