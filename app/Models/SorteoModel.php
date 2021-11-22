<?php

namespace App\Models;

use CodeIgniter\Model;

class SorteoModel extends Model
{
    protected $table      = 'sorteo';
    protected $primaryKey = 'id_sorteo';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'id_sorteo', 
        'ip_sorteo',
        'date_sorteo',
        'hour_sorteo',
        'id_order_sorteo',
        'email_sorteo',
        'price_order_sorteo'
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

    public function isCreated($idorder){
        if($this->where('id_order_sorteo',$idorder)->first()){
            return true;
        }else{
            return false;
        }
    }

    
}
