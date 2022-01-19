<!--
=========================================================
* Material Kit 2 - v3.0.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/public/favicon.ico">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/public/favicon.ico">
    <title>
        Distribuidores PERA
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/public/assets-materials-kit/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/public/assets-materials-kit/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>/public/assets-materials-kit/css/material-kit.css?v=3.0.0" rel="stylesheet" />
    <!-- fabian CSS -->
    <link href="<?= base_url() ?>/public/assets-materials-kit/css/fabian1.css" rel="stylesheet" />
</head>

<body class="about-us bg-gray-200">
    <!-- Navbar Transparent -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
            <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                <img style="max-height: 3rem;" src="<?= base_url() ?>/public/pictures/peradk/logo3.png" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                    <li class="nav-item my-auto ms-3 ms-lg-0">
                        <a href="<?= base_url() ?>" class="btn btn-sm  bg-primary  mb-0 me-1 mt-2 mt-md-0">IR A LA TIENDA</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- -------- START HEADER 7 w/ text and video ------- -->
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-75" style="background-image: url('<?= base_url() ?>/public/img/form_dealer/background1.jpg');">
            <span class="mask "></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <?php if (empty(session()->get('form_completed'))) : ?>
                            <h1 style="font-family: 'Bebas';background-color: #D290F4; border-radius: 10px; padding: 1rem; color: #000000; font-weight: 600;">
                                ¿Quieres ser <br> PERA distribuidor <br> autorizado?
                            </h1>
                            <p class="lead mb-4 text-white opacity-8 mt-5">Déjanos algunos datos para poderte contactar.</p>
                            <!-- <button type="submit" class="btn bg-white text-dark">Create Account</button> -->
                        <?php else : ?>
                            <h1 class="text-white">Muchas Gracias!</h1>
                            <p class="lead mb-4 text-white opacity-8 mt-5">Ya hemos registrado tu informaci&oacute;n en nuestras bases de datos.</p>
                        <?php endif; ?>
                        <h6 class="text-white mb-2 mt-5">S&iacute;guenos</h6>
                        <div class="d-flex justify-content-center">
                            <a href="https://www.facebook.com/AlpargatasPeRa/"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
                            <a href="https://www.instagram.com/peracolombia/"><i class="fab fa-instagram text-lg text-white me-4"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=573143377306"><i class="fab fa-whatsapp text-lg text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6 mb-5">
        <?php if (empty(session()->get('form_completed'))) : ?>
            <form action="<?= base_url() . route_to('send_data_form') ?>" method="post">

                <section class="py-5">

                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-1">

                            </div>
                            <div class="col-lg-10">
                                <div class="row justify-content-start">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">Nombres</label>
                                            <input name="nombres" class="form-control" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">Apellidos</label>
                                            <input name="apellidos" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group mb-4">
                                            <select name="tipo_de_identificacion" class="form-select" aria-label="Default select example" required>
                                                <option value="">-- Tipo de Identificaci&oacute;n --</option>
                                                <?php foreach ($type_identifications as $type) : ?>
                                                    <option value="<?= $type['id_type_identification'] ?>"><?= $type['abb_type_identification'] ?> - <?= $type['name_type_identification'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">N&uacute;mero de Identificaci&oacute;n</label>
                                            <input name="numero_de_identifiacion" type="text" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">WhatsApp o N&uacute;m Celular</label>
                                            <input name="numero_celular" type="number" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">Correo electr&oacute;nico</label>
                                            <input name="correo_electronico" type="email" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">Ocupaci&oacute;n</label>
                                            <input name="ocupacion" type="text" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group mb-4">
                                            <select name="estado_civil" class="form-select" aria-label="Default select example" required>
                                                <option value="">-- Estado Civil --</option>
                                                <?php foreach ($civil_status as $status) : ?>
                                                    <option value="<?= $status['id_civil_status'] ?>"><?= $status['name_civil_status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label class="form-label">Direcci&oacute;n</label>
                                            <input name="direccion" type="text" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="input-group input-group-outline mb-4">
                                            <label for="fnac">Fecha de </br> nacimiento -</label>
                                            <input name="fecha de nacimiento" id="fnac" type="date" class="form-control mb-sm-0" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>

                <section class="pb-5 position-relative bg-gradient-dark mx-n3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 text-start mb-5 mt-5">
                                <h3 class="text-white z-index-1 position-relative principal-font">DATOS DE ASPIRACION PERA DISTRIBUIDOR AUTORIZADO</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="card card-profile mt-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-6 mt-n5">
                                            <a href="javascript:;">
                                                <div class="p-3 pe-md-0">
                                                    <img class="w-100 border-radius-md shadow-lg" src="<?= base_url() ?>/public/img/form_dealer/quest1.jpeg" alt="image">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                                            <div class="card-body ps-lg-0">
                                                <h5 class="mb-0">¿En cuál ciudad/país estás interesado en colocar tu PERA punto de distribución?</h5>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-4">
                                                            <select id="select_department" class="form-select" aria-label="Default select example">
                                                                <option value="">-- Departamento --</option>
                                                                <?php foreach ($departments as $department) : ?>
                                                                    <option value="<?= $department['iddepartment'] ?>"><?= $department['name_department'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-4">
                                                            <select name="ciudad" id="cities_select" class="form-select" aria-label="Default select example" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="card card-profile mt-lg-4 mt-5">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-6 mt-n5">
                                            <a href="javascript:;">
                                                <div class="p-3 pe-md-0">
                                                    <img class="w-100 border-radius-md shadow-lg" src="<?= base_url() ?>/public/img/form_dealer/quest2.jpeg" alt="image">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                                            <div class="card-body ps-lg-0">
                                                <h5 class="mb-0">
                                                    ¿En cuál sector/centro comercial estas interesado en ubicar tu PERA punto de distribución?
                                                </h5>
                                                <div class="col-md-12 mt-3">
                                                    <div class="input-group input-group-outline mb-4">
                                                        <label class="form-label">Sector/Centro Comercial</label>
                                                        <input name="pregunta_2" type="text" class="form-control mb-sm-0" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-12">
                                <div class="card card-profile mt-4 z-index-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-6 mt-n5">
                                            <a href="javascript:;">
                                                <div class="p-3 pe-md-0">
                                                    <img class="w-100 border-radius-md shadow-lg" src="<?= base_url() ?>/public/img/form_dealer/quest3.jpeg" alt="image">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                                            <div class="card-body ps-lg-0">
                                                <h5 class="mb-0">¿Cuánto es tu presupuesto para abrir tu PERA punto de distribución?</h5>
                                                <select name="pregunta_3" class="form-select mt-3" aria-label="Default select example" required>
                                                    <option value="">-- Presupuesto --</option>
                                                    <option value="1-10">De 1 a 10 millones</option>
                                                    <option value="10-20">De 10 a 20 millones</option>
                                                    <option value="20-30">De 20 a 30 millones</option>
                                                    <option value="30-40">De 30 a 40 millones</option>
                                                    <option value="40-50">De 40 a 50 millones</option>
                                                    <option value="50-60">De 50 a 60 millones</option>
                                                    <option value="60-70">De 60 a 70 millones</option>
                                                    <option value="70-80">De 70 a 80 millones</option>
                                                    <option value="80-90">De 80 a 90 millones</option>
                                                    <option value="90-100">De 90 a 100 millones</option>
                                                    <option value="100+">M&aacute;s de 100 millones</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-6 mt-n5">
                                            <a href="javascript:;">
                                                <div class="p-3 pe-md-0">
                                                    <img class="w-100 border-radius-md shadow-lg" src="<?= base_url() ?>/public/img/form_dealer/quest4.jpeg" alt="image">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                                            <div class="card-body ps-lg-0">
                                                <h5 class="mb-0">¿Por qué quieres ser un PERA distribuidor autorizado?</h5>
                                                <div class="col-md-12 mt-3">
                                                    <div class="input-group input-group-outline mb-4">
                                                        <textarea maxlength="1000" name="pregunta_4" type="text" class="form-control mb-sm-0" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="my-5 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-10 mt-4">
                                <div class="card">
                                    <div class="card-body text-center p-2">
                                        <h5 class="principal-font">
                                            REFERENCIAS COMERCIALES
                                        </h5>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-outline mb-4">
                                                                <label class="form-label">Nom Ref 1</label>
                                                                <input name="nombre_ref_1" type="text" class="form-control mb-sm-0" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-outline mb-4">
                                                                <label class="form-label">Tel Ref 1</label>
                                                                <input name="telefono_ref_1" type="number" class="form-control mb-sm-0" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-outline mb-4">
                                                                <label class="form-label">Nom Ref 1</label>
                                                                <input name="nombre_ref_2" type="text" class="form-control mb-sm-0" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-outline mb-4">
                                                                <label class="form-label">Tel Ref 1</label>
                                                                <input name="telefono_ref_2" type="number" class="form-control mb-sm-0" required>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check mt-5">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Si, acepto la <a style="color: #D290F4;" href="https://peradk.com/public/archivos/tratamiento_de_datos.pdf">politica de privacidad</a> de PeRa DK SAS.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn bg-gradient-primary btn-icon btn-lg mt-5" type="submit">
                                <div class="d-flex align-items-center">
                                    ENVIAR
                                    <i class="material-icons ms-2" aria-hidden="true">favorite</i>
                                </div>
                            </button>
                        </div>
                    </div>
                </section>
            </form>
        <?php else : ?>
            <div class="container mb-4">
                <div class="row justify-content-center ">
                    <div class="col-lg-4">
                        <img src="<?= base_url() ?>/public/pictures/peradk/creo_en_mi_me_lo_merezco.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if (empty(session()->get('form_completed'))) : ?>
        <div class="container mb-6">
            <div class="row justify-content-center ">
                <div class="col-lg-4">
                    <img src="<?= base_url() ?>/public/pictures/peradk/creo_en_mi_me_lo_merezco.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/plugins/countup.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="<?= base_url() ?>/public/assets-materials-kit/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
    <script>
        // get the element to animate
        var element = document.getElementById('count-stats');
        var elementHeight = element.clientHeight;

        // listen for scroll event and call animate function

        document.addEventListener('scroll', animate);

        // check if element is in view
        function inView() {
            // get window height
            var windowHeight = window.innerHeight;
            // get number of pixels that the document is scrolled
            var scrollY = window.scrollY || window.pageYOffset;
            // get current scroll position (distance from the top of the page to the bottom of the current viewport)
            var scrollPosition = scrollY + windowHeight;
            // get element position (distance from the top of the page to the bottom of the element)
            var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;
            // is scroll position greater than element position? (is element in view?)
            if (scrollPosition > elementPosition) {
                return true;
            }
            return false;
        }

        var animateComplete = true;
        // animate element when it is in view
        function animate() {

            // is element in view?
            if (inView()) {
                if (animateComplete) {
                    if (document.getElementById('state1')) {
                        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
                        if (!countUp.error) {
                            countUp.start();
                        } else {
                            console.error(countUp.error);
                        }
                    }
                    if (document.getElementById('state2')) {
                        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
                        if (!countUp1.error) {
                            countUp1.start();
                        } else {
                            console.error(countUp1.error);
                        }
                    }
                    if (document.getElementById('state3')) {
                        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
                        if (!countUp2.error) {
                            countUp2.start();
                        } else {
                            console.error(countUp2.error);
                        };
                    }
                    animateComplete = false;
                }
            }
        }

        if (document.getElementById('typed')) {
            var typed = new Typed("#typed", {
                stringsElement: '#typed-strings',
                typeSpeed: 90,
                backSpeed: 90,
                backDelay: 200,
                startDelay: 500,
                loop: true
            });
        }
    </script>
    <script>
        if (document.getElementsByClassName('page-header')) {
            window.onscroll = debounce(function() {
                var scrollPosition = window.pageYOffset;
                var bgParallax = document.querySelector('.page-header');
                var oVal = (window.scrollY / 3);
                bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
            }, 6);
        }
    </script>
    <script src="<?php echo base_url() ?>/public/assets/vendor/jquery/jquery.min.js"></script>
    <!----SCRIPT PARA CARGAR LAS CIUDADES ------>
    <script>
        $(document).ready(function() {
            reloadcities();
            $("#select_department").change(function() {
                reloadcities();
            });
        });

        function reloadcities() {
            $.ajax({
                type: "post",
                url: "<?= base_url() . route_to('ajax_get_cities') ?>",
                data: "department=" + $("#select_department").val(),
                success: function(r) {
                    $("#cities_select").html(r);
                },
            });
        }
    </script>
</body>

</html>