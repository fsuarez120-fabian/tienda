<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeIdentificationModel extends Model
{
    protected $table      = 'type_identification';
    protected $primaryKey = 'id_type_identification';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [];
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
