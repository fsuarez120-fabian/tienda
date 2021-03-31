<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryhassizeModel extends Model
{
    protected $table      = 'category_has_size';
    protected $primaryKey = 'category_idcategory';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = ['name', 'email'];
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
