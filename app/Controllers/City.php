<?php

namespace App\Controllers;

use App\Models\CityModel;
use App\Models\ProductModel;

class City extends BaseController
{
    public function __construct()
    {
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
    }
    public function getcities()
    {
        $modelCity = new CityModel();
        $cities = $modelCity->where('department_city', $this->request->getPostGet('department'))->orderBy('name_city', 'ASC')->findAll();
        $cadena = "<select class='custom-select' name='city' required>
        <option value=''>* Ciudad</option>
        ";
        foreach ($cities as $city) {
            $cadena = $cadena . '<option value="' . $city['idcity'] . '">' . $city['name_city'] . '</option>';
        }
        echo $cadena . "</select>";
        return true;
    }

    public function getHtmlCities()
    {
        $modelCity = new CityModel();
        $cities = $modelCity->where('department_city', $this->request->getPostGet('department'))->orderBy('name_city', 'ASC')->findAll();
        $cadena = "
        <option value=''>* Ciudad</option>
        ";
        foreach ($cities as $city) {
            $cadena = $cadena . '<option value="' . $city['idcity'] . '">' . $city['name_city'] . '</option>';
        }
        echo $cadena;
        return true;
    }
}
