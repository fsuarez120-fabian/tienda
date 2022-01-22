<div class="content-wrapper">
    <!-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BRUTOS PERO DECIDIDOS!!!</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> -->

    <section class="content">
        <div class="container-fluid">
            <!-- ======= Hero Section ======= -->
            <?php
            if (session()->idadministrator == '1094280366') {
            ?>
                <h2>Eliana digita el numero que me dijiste ayer, recuerdas?</h2>
                <form action="<?= base_url() . route_to('admin_page_msg_encripted'); ?>" method="post">
                    <input type="password" name="pass">
                    <button type="submit">Seguir</button>
                </form>
            <?php
            }
            ?>
            <!-- <div class="text-center">
                <img src="<?= base_url() ?>/public/pictures/peradk/twologo1.png" class="img-fluid" alt="">
            </div> -->
        </div>
    </section><!-- End Hero -->
</div>