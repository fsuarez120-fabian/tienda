<main id="main">
    <!-- ======= Iniciar Sesion Section ======= -->
    <section class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            </div>
            <form action="<?php echo base_url() . route_to('cart'); ?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <img src="<?= base_url('public/pictures/group_products/thumbnails') . '/' . $ref_family['image_reference_group'] ?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="id_category"><b>Seleccione el porducto que quieres</b></label>
                                    <select id="select_products_family" name="id_category" class="form-control" required>
                                        <option value="">Producto *</option>
                                        <?php foreach ($products as $products) : ?>
                                            <option value="<?= $products->category_idcategory ?>"><?= $products->category()['name_category'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <div id="info_family">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?= $this->section('js') ?>
<script>
    //TRAER LA INFORMACION DEL DETALLE DE PORDUCTOS

    $(document).ready(function() {
        $("#select_products_family").change(function() {
            loadinformation();
        });
    });

    function loadinformation() {
        $.ajax({
            type: "post",
            url: "<?= base_url() . route_to('get_info_detail_family') ?>",
            data: {
                category: $("#select_products_family").val(),
                reference: <?= $reference ?>
            },
            success: function(r) {
                $("#info_family").html(r);
            },
        });
    }
</script>
<?= $this->endSection() ?>