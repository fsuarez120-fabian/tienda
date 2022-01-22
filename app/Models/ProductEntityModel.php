<?php

namespace App\Models;

use App\Entities\Product;
use CodeIgniter\Model;

class ProductEntityModel extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'reference';


    protected $returnType     = Product::class;
    /*
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'reference',
        'category_idcategory',
        'name_product',
        'active_product',
        'image_product'
    ];
    /*
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
