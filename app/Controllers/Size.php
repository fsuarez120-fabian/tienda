<?php

namespace App\Controllers;

use App\Models\CategoryhassizeModel;


class Size extends BaseController
{
    public function index()
    {
    }

    public function getSizes()
    {
        if (!$horma = $this->request->getGetPost('horma')) {
            return true;
        } else {
            switch ($horma) {
                case 'mujer':
                    $category = 12;
                    break;
                case 'hombre':
                    $category = 120;
                    break;
                case 'nina':
                    $category = 23;
                    break;
                case 'nino':
                    $category = 23;
                    break;
            }
            $sizesModel = new CategoryhassizeModel();
            $sizes = $sizesModel
                ->where('category_idcategory', $category)
                ->findAll();

            $cadena = "<select class='form-control' name='size' required>
            <option value=''>* Talla </option>";
            foreach ($sizes as $size) {
                $cadena .= '<option value="' . $size['size_idsize'] . '">' . $size['size_idsize'] . '</option>';
            }
            echo $cadena . '</select>
            <p class="form-text text-muted">
                <b>PeRa amiguis pide la talla que más utilizas en camiseta nacional.</b>
            </p>';
            return true;
        }
    }
}
