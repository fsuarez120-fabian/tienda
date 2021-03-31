<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaction';
    protected $primaryKey = 'idtransaction';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'idtransaction',
        'reference_sale',
        'state_pol',
        'reference_pol',
        'value',
        'transaction_date',
        'cus',
        'pse_bank',
        'ip',
        'payment_method_id',
        'response_message_pol',
        'payment_method_name',
        'sign',
        'key_sign'
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


    public function getTransactionBy($column, $value)
    {
        return $this->where($column, $value)->findAll();
    }
}
