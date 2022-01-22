<?php

namespace App\Controllers;

use App\Models\ProductEntityModel;
use App\Models\ProductModel;

class Ajax extends BaseController
{
    public function __construct()
    {
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    }

    public function getDetailFamily()
    {
        $mdlProduct = new ProductEntityModel();
        $category = $this->request->getPost('category');
        $ref = $this->request->getPost('reference');

        switch ($category) {
            case 3:
                $messegesize = "<p class='form-text text-muted'>
                <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src='" . base_url() . "/public/pictures/peradk/colombia.svg' alt='' style='width: 20px;'>. Recuerda que lo puedes usar como prenda casual o traje de baño.
                <br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
                <br><b>Talla para niñas </b>(0 a la 16).
                <br><b>Talla para adulto </b>(XS a la XXXL).
            </p>";
                break;
            case 4:
                $messegesize = "<p class='form-text text-muted'>
                <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src='" . base_url() . "/public/pictures/peradk/colombia.svg' alt='' style='width: 20px;'>. Recuerda que lo puedes usar como prenda casual o traje de baño.
                <br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
                <br><b>Talla para niñas </b>(0 a la 16).
                <br><b>Talla para adulto </b>(XS a la XXXL).
            </p>";
                break;
            case 7:
                $messegesize = "<p class='form-text text-muted'>
                <b>Pide la talla que más utilices en Jeans Nacional <img src='" . base_url() . "/public/pictures/peradk/colombia.svg' alt='' style='width: 20px;'>.</b>
            </p>";
                break;
        }

        return view('ajax/detail_info_family', [
            'ref' => $ref,
            'product' => $mdlProduct->where('category_idcategory', $category)->where('reference', $ref)->first(),
            'messegesize' => $messegesize
        ]);
    }
}
