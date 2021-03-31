<main id="main">
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <br>
                <h2>Gracias por participar PeRa Amiguis!!!</h2>
            </div>
            <div class="info">

                <div class="row">
                    <div class="col-md-5">
                        <img src="<?= base_url() ?>/public/pictures/peradk/peramoto.png" class="img-fluid" alt="">
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-7">
                        <div class="card text-center">
                            <div class="card-header">
                                PeRa Amiguis <?= $order['cli_nombres'] ?>, ya completaste todos los pasos para participar en el sorteo de la moto, con los datos de tu pedido:
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"> <b> Cedula:</b></label>
                                    <label class="col-sm-8 col-form-label"><?= $order['cli_documento'] ?></label>
                                    
                                </div>
                             
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Cantidad:</b></label>
                                    <label class="col-sm-8 col-form-label"><?= $order['ped_cantidad'] ?></label>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Email:</b></label>
                                    <label class="col-sm-8 col-form-label"><?= $order['cli_email'] ?></label>
                                    
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>WhatsApp:</b></label>
                                    <label class="col-sm-8 col-form-label"><?= $order['cli_whatsapp'] ?></label>
                                   
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><b>Información del pedido:</b></label>
                                    <label class="col-sm-8 col-form-label"><?= $order['ped_inf'] ?></label>
                                 
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