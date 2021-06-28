<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferencegroupModel extends Model
{
    protected $table      = 'reference_group';
    protected $primaryKey = 'id_reference_group';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'id_reference_group',
        'name_reference_group',
        'active_reference_group',
        'image_reference_group',
        'score_reference_group',
        'group_of_category_id_group_of_category',
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
