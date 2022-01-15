<?php

namespace App\Models;

use CodeIgniter\Model;

class CivilStatusModel extends Model
{
    protected $table      = 'civil_status';
    protected $primaryKey = 'name_civil_status';

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
