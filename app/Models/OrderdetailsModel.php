<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderdetailsModel extends Model
{
    protected $table      = 'orderdetails';
    protected $primaryKey = 'order_reference_order';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'order_reference_order',
        'product_reference',
        'product_category_idcategory',
        'size_idsize',
        'quantity_orderdetails',
        'unit_price_orderdetails',
        'observation_orderdetails',
        'horma_orderdetails'
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


    public function getItemWithCategory($reference)
    {
        return $this->db->table('orderdetails')
            ->select('*')
            ->join('category', 'orderdetails.product_category_idcategory = category.idcategory')
            ->where('orderdetails.order_reference_order', $reference)
            ->get()->getResultArray();
    }
  
}
