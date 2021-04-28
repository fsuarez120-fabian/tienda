<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $table      = 'link';
    protected $primaryKey = 'id_link';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'id_link',
        'url_link',
        'order_link',
        'date_link',
        'hour_link',
        'admin_link'
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


    public function getLinkBy($column,$value){ 
        return $this->db->table('link')
            ->select('*')
            ->join('order', 'order.reference_order = link.order_link')
            ->where($column,$value)->orderBy('id_link','desc')
            ->get()->getResultArray();
    }

    public function isLink($reference){
        if(!$this->where('order_link',$reference)->first()){
            return false;
        }else{
            return true;
        }
    }

    public function getCedula($reference){
        return $this->where('order_link',$reference)->first()['admin_link'];
    }
}
