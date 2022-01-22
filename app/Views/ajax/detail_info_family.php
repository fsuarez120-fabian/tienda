<div class="col-lg-7">
    <div class="text-right">
        <br>
        <h3> <?php echo 'Ref: ' . $ref . ' - ' . $product->category()['name_category'] ?></h3>
        <h1>$ <?= number_format($product->category()['price_category']) ?></h1>
    </div>
    <div class="row">
        <div class="col">
            <?php
            $sizes = $product->sizes();
            $category = $product->category();
            if (count($sizes) >= 1) {
                if ($category['idcategory'] == 4 || $category['idcategory'] == 3) {
                    if ($ref == 262) {
                        echo ' <select name="size" class="form-control" required>
                            <option value="">Talla</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="XXXL">XXXL</option>
                            ';
                        $messegesize = '<p class="form-text text-muted">
                            <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">. Recuerda que lo puedes usar como prenda casual o traje de baño.
                            <br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
                            <br><b>Talla para adulto </b>(XS a la XXXL).';
                    } else {
                        echo ' <select name="size" class="form-control" required>
                            <option value="">Talla</option>';
                        foreach ($sizes as $size) {
                            echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                        }
                    }
                } else {
                    echo ' <select name="size" class="form-control" required>
                            <option value="">Talla</option>';
                    foreach ($sizes as $size) {
                        echo  '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
                    }
                }
                echo ' </select>';
                echo $messegesize;
                echo '<input type="hidden" name="observation" value="">';
                echo '<input type="hidden" name="horma" value="">';
            }
            ?>

        </div>
    </div>
    <select name="quantity" class="form-control" required>
        <option value="1">Cantidad 1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
    </select>
    <p class="form-text text-muted">
        <b>Escoja la cantidad de PeRa productos que deseas 🍐.</b><br>
    </p>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="col-10">
                <div class="text-center">
                    <input type="hidden" name="reference" value="<?= $ref ?>">
                    <input type="hidden" name="r" value="addproduct">
                    <input type="hidden" name="name" value="<?= $product->name_product ?>">
                    <input type="hidden" name="image" value="<?= $product->image_product ?>">
                    <input type="hidden" name="category" value="<?= $product->category_idcategory ?>">
                    <button type="submit" class="btn-aceptar">
                        Agregar al Carrito de Compras
                    </button><br>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>