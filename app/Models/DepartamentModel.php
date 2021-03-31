<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartamentModel extends Model
{
    protected $table      = 'department';
    protected $primaryKey = 'iddepartment';

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
