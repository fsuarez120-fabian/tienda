<?php

namespace App\Models;

use CodeIgniter\Model;

class CodigomotoModel extends Model
{
    protected $table      = 'codigosmoto';
    protected $primaryKey = 'id_codigosmoto';

    protected $allowedFields = [
        'id_codigosmoto',
        'codigo_codigo',
        'id_pedido',
        'by_codigo',
        'cliente_codigo',
        'created_at_codigo',
        'updated_at_codigo',
        'active',
        'ip_codigo'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at_codigo';
    protected $updatedField  = 'updated_at_codigo';
}
