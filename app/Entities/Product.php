<?php

namespace App\Entities;

use App\Models\CategoryhassizeModel;
use App\Models\CategoryModel;
use CodeIgniter\Entity;

class Product extends Entity
{
    public function category()
    {
        $mdlCategory = new CategoryModel();
        return $mdlCategory->find($this->category_idcategory);
    }

    public function sizes()
    {
        $mdlSizes = new CategoryhassizeModel();
        return $mdlSizes->where('category_idcategory', $this->category_idcategory)->findAll();
    }
}
