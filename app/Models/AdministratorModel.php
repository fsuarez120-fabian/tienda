<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministratorModel extends Model
{
    protected $table      = 'administrator';
    protected $primaryKey = 'idadministrator';

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

    public function getAdministratorBy(string $column, $value)
    {
        return $this->where($column, $value)->first();
    }
}
