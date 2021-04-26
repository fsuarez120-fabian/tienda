<?php

namespace App\Controllers;

use App\Models\CityModel;
use App\Models\ProductModel;

class City extends BaseController
{
    public function index()
    {
    }

    public function getcities()
    {

        $modelCity = new CityModel();
        $cities = $modelCity->where('department_city', $this->request->getPostGet('department'))->findAll();
        $cadena = "<select class='custom-select' name='city' required>
        <option value=''>* Ciudad</option>
        ";
        foreach ($cities as $city) {
            $cadena = $cadena . '<option value="' . $city['idcity'] . '">' . $city['name_city'] . '</option>';
        }
        echo $cadena . "</select>";
        return true;
    }
}
