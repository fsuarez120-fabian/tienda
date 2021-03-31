<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table      = 'city';
    protected $primaryKey = 'idcity';

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

    public function getcity($city)
    {

        return $this->db->table('city c')
            ->select('*')
            ->join('department d', 'c.department_city = d.iddepartment')
            ->where('c.idcity', $city)
            ->get()->getResultArray();
    }
}
