<section id="team" class="team section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <br>
            <h2><?php
                echo 'P E R A ' . $title;
                ?></h2>
            <p1></p1>
        </div>
        <div class="row">

            <?php
            foreach ($products as $product) {
            ?>
                <div class="col-12 col-md-4 col-lg-<?php if($product['category_idcategory'] == 22||$product['category_idcategory'] == 10){echo '4';}else{echo'3';}?>">
                    <div class="member align-items-start aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="text-center">
                            <a href="<?= base_url('productos') . '/' . $route . '/' .  $product['reference'];
                                        if ($product['category_idcategory'] == 100 || $product['category_idcategory'] == 200) {
                                            echo "/{$product['category_idcategory']}";
                                        } ?>">
                                <img src="<?= base_url() . route_to('images_products_miniaturas') . '/' . $product['image_product'] ?>" alt="<?php echo $product['image_product']; ?>" class="img-fluid">
                                <p>Ref: <?= $product['reference']; ?></p>
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