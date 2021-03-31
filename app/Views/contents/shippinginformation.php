<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title">
            <br>
            <h2>Datos de env&Iacute;o</h2>
        </div>
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">

                <div class="info">
                    <h3>Datos de Env&Iacute;o</h3>
                    <br>

                    <form action="<?= base_url() . route_to('finalize') ?>" method="post">
                        <div class="row">
                            <div class="input-group mb-3">
                                <i class="icofont-direction-sign"></i>
                                <select class="custom-select" id="department" name="department" required>
                                    <option value="">* Departamento</option>
                                    <?php
                                    foreach ($departments as $depart) {
                                        echo  '<option value="' . utf8_decode($depart['iddepartment']) . '">' . utf8_decode($depart['name_department']) . '</option>';
                                    }
                                    ?>
                                </select>

                                <div id="cities">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group">
                                <i class="icofont-direction-sign"></i>

                                <input value="<?= $informationshipping['adress'] ?>" placeholder="* Dirección" type="text" name="adress" class="form-control" required>
                                <input value="<?= $informationshipping['neighborhood'] ?>" placeholder="* Barrio" type="text" name="neighborhood" class="form-control" required>

                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="input-group">
                                <i class="icofont-ui-user"></i>

                                <input value="<?= $informationshipping['name'] ?>" name="name" placeholder="* Nombres" type="text" class="form-control" required>
                                <input value="<?= $informationshipping['surname'] ?>" name="surname" placeholder="* Apellidos" type="text" class="form-control" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="input-group mb-3">
                                <i class="icofont-id"></i>


                                <select name="typeid" class="custom-select" id="inputGroupSelect01" required>
                                    <option value="Cedula">Cedula</option>
                                    <option value="NIT">NIT</option>
                                </select>
                                <input value="<?= $informationshipping['numberid'] ?>" name="numberid" placeholder="* Número" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <i class="icofont-brand-whatsapp"></i>
                                <input value="<?= $informationshipping['numphone'] ?>" placeholder="* Celular" type="number" name="numphone" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group mb-3">
                                <i class="icofont-ui-email"></i>
                                <input value="<?= $informationshipping['email'] ?>" placeholder="* Email" type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit">Continuar</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-lg-2">

            </div>

        </div>

    </div>
</section>