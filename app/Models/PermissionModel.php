<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table      = 'administrator_has_permission';
    protected $primaryKey = 'administrator_idadministrator';

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

    public function hasPermission($permission, $cedula = null)
    {
        if ($cedula == null) {
            if (!$this->where('administrator_idadministrator', session()->idadministrator)->where('permission_idpermission', $permission)->where('active_permission', 1)->first()) {
                return false;
            } else {
                return true;
            }
        } else {
            if (!$this->where('administrator_idadministrator', $cedula)->where('permission_idpermission', $permission)->where('active_permission', 1)->first()) {
                return false;
            } else {
                return true;
            }
        }
    }
}
