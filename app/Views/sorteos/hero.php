<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <h1 style="margin-bottom: 0;">PERA SORTEO</h1>
                    <h2 style="margin-bottom: 1rem; font-size: 20px; color: #fff;">G&aacute;nate una hermosa PERA Moto, para que puedas llevar felicidad a cada uno de los hogares colombianos &#127824;&#128156;</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?= base_url() . route_to('form_sorteo') ?>">

                            <?php if (session()->errors) { ?>
                                <br>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->errors ?>
                                </div>
                            <?php } ?>

                            <?php if (session()->msg) { ?>
                                <br>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->msg ?>
                                </div>
                            <?php } ?>

                            <div style="margin-bottom: 0;" class="form-group">
                                <label style="font-size: 1rem;color: #fff; margin-bottom: 0;" class="label-sorteo">
                                    Código
                                </label>
                                <input style="height: 2rem;" name="code" type="text" class="form-control" value="<?= old('code') ?>" placeholder="Este codigo te lo da tu PeRa embajador." required />
                                <p class="text-danger"><?= session('validate.code') ?></p>
                            </div>

                            <div style="margin-bottom: 0;" class="form-group">
                                <label style="font-size: 1rem;color: #fff; margin-bottom: 0;" class="label-sorteo">
                                    C&eacute;dula
                                </label>
                                <input style="height: 2rem;" name="cedula" type="number" class="form-control" value="<?= old('cedula') ?>" placeholder="Tu número de identificación sin puntos." required />
                                <p class="text-danger"><?= session('validate.cedula') ?></p>
                            </div>

                            <div style="margin-bottom: 1rem;" class="checkbox">
                                <a href="https://peradk.com/public/archivos/Terminos_Condiciones_Sorteo.pdf">Aplican t&eacute;rminos y condiciones.</a>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            PARTICIPAR
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <a href="https://www.youtube.com/watch?v=0wwONOCrWiw" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true">¿C&oacute;mo participar? <i class="icofont-play-alt-2"></i></a>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url() ?>/public/pictures/peradk/new_peramoto.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section>