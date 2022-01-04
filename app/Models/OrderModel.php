<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'reference_order';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'reference_order',
        'date_order',
        'product_price_order',
        'freight_price_order',
        'total_price_order',
        'state_order',
        'shippinginfo_idshipinfo',
        'consecutive_order'
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

    public function getordersfordays($date)
    {
        return $this->db->table('order o')
            ->select('*')
            ->join('shippinginfo d', 'o.reference_order = d.idshipinfo')
            ->where('o.date_order', $date)
            ->get()->getResultArray();
    }

    public function getOrderForTransactionFinished($date)
    {
        //cambiar formato AAAA-MM-DD por AAAA.MM.DD
        $newDate = str_replace('-', '.', $date);

        //buscar las transacciones del dia;
        $modelTransacction = new TransactionModel();
        $where = "`transaction_date` LIKE '%$newDate%'";
        $TransactionsDay = $modelTransacction->select('reference_sale')->where($where)->findAll();
        
        if (count($TransactionsDay)< 1) {
            return array();
        } else {
            $references = array();
            foreach ($TransactionsDay as $Transaction) {
                array_push($references, $Transaction['reference_sale']);
            }
            return $this->db->table('order o')
                ->select('*')
                ->join('shippinginfo d', 'o.reference_order = d.idshipinfo')
                ->whereIn('o.reference_order', $references)
                ->get()->getResultArray();
        }
    }

    public function getState($reference){
        return $this->where('reference_order',$reference)->first()['state_order'];
    }

    public function disableLink($reference){
        return $this->set('state_order','DISABLED')->where('reference_order',$reference)->update();
    }

}
