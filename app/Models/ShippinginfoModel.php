<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippinginfoModel extends Model
{
    protected $table      = 'shippinginfo';
    protected $primaryKey = 'idshipinfo'; 

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'idshipinfo',
        'city_idcity',
        'address_shippinginfo',
        'neighborhood_shippinginfo',
        'name_shippinginfo',
        'surname_shippinginfo',
        'typeid_shippinginfo',
        'number_id_shippinginfo',
        'number_phone_shippinginfo',
        'email_shippinginfo'
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
