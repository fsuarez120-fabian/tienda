<main id="main">
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <br>
                <h2 style="color: #fff;">Gracias por participar PeRa Amiguis!!!</h2>
            </div>
            <div >
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>/public/pictures/peradk/peramoto.png" class="img-fluid" alt="">
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header">
                                PeRa Amiguis, ya completaste todos los pasos para participar en el sorteo
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"> <b> Codigo:</b></label>
                                    <label class="col-sm-8 col-form-label"><?=$code?></label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Cedula:</b></label>
                                    <label class="col-sm-8 col-form-label"><?=$cedula?></label>
                                </div>

                            </div>

                            <div class="card-footer text-muted">
                                <div class="text-center">
                                    <a href="<?= base_url() ?>">
                                        <button type="submit" class="btn-aceptar">
                                            FINALIZAR
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>