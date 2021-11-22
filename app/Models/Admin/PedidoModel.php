<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $DBGroup = 'peradkco_admin';
    protected $table      = 'pedidos';
    protected $primaryKey = 'ped_id';

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

    public function getPedido($id)
    {
        $where = "p.ped_id LIKE '$id' AND ((p.ped_fechaInicio LIKE '%2021-03-%') OR (p.ped_fechaInicio LIKE '%2021-04-%'))";
        return
            (array)$this->db->table('pedidos p')
                ->select('*')
                ->join('clientes c', 'p.cli_documento = c.cli_documento')
                ->where($where)->get()->getFirstRow();
    }
}
