<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <br>
            <h2>PeRa Familia</h2>
            <p1></p1>
        </div>
        <div class="row">

            <?php
            foreach ($products as $product) {
            ?>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="member align-items-start aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="text-center">
                            <a href="<?= base_url() . route_to('detail_group_family', $product['id_reference_group']) ?>">
                                <img src="<?= base_url('public/pictures/group_products/thumbnails') . '/' . $product['image_reference_group'] ?>" class="img-fluid">
                                <p>Ref: <?= $product['id_reference_group']; ?></p>
                            </a>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
</section>