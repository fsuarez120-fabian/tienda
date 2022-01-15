<?php

namespace App\Models;

use CodeIgniter\Model;

class FormDealerModel extends Model
{
    protected $table      = 'form_dealer';
    protected $primaryKey = 'type_identification_id';

    /* 
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    */

    protected $allowedFields = [
        'name_form',
        'surname_form',
        'type_identification_id',
        'number_identification_form',
        'celular_form',
        'email_form',
        'ocupation_form',
        'civil_status_id',
        'adress_form',
        'date_birth_form',
        'city_id_form',
        'quest2',
        'quest3',
        'quest4',
        'name_ref_1',
        'tel_ref_1',
        'name_ref_2',
        'tel_ref_2',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    /*
    protected $deletedField  = 'deleted_at';
    */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
