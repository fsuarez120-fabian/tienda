<?php

namespace App\Controllers;

use App\Models\Admin\PedidoModel;
use App\Models\CivilStatusModel;
use App\Models\DepartamentModel;
use App\Models\FormDealerModel;
use App\Models\SorteoModel;
use App\Models\TypeIdentificationModel;

class Dealer extends BaseController
{
    public function __construct()
    {
        $this->mdlTypeIdentification = new TypeIdentificationModel();
        $this->mdlCivilStatus = new CivilStatusModel();
        $this->mdldepartments = new DepartamentModel();
        $this->mdlFormDealer = new FormDealerModel();
    }

    public function form()
    {
        return view('deaders/form', [
            'type_identifications' => $this->mdlTypeIdentification->where('active_type_identification', true)->findAll(),
            'civil_status' =>  $this->mdlCivilStatus->where('active_civil_status', true)->findAll(),
            'departments' => $this->mdldepartments->findAll()
        ]);
    }

    public function validateForm()
    {
        if (!empty(session()->get('form_completed'))) {
            return redirect()->to(base_url() . route_to('form_dealer'));
        }
        if (!$this->validate([
            'nombres'    =>  'required',
            'apellidos' => 'required',
            'tipo_de_identificacion' => 'required|is_not_unique[type_identification.id_type_identification]',
            'numero_de_identifiacion' => 'required',
            'numero_celular' => 'required',
            'correo_electronico' => 'required|valid_email',
            'ocupacion' => 'required',
            'estado_civil' => 'required|is_not_unique[civil_status.id_civil_status]',
            'direccion' => 'required',
            'fecha_de_nacimiento' => 'required|valid_date[Y-m-d]',
            'ciudad' => 'required|is_not_unique[city.idcity]',
            'pregunta_2' => 'required',
            'pregunta_3' => 'required',
            'pregunta_4' => 'required',
            'nombre_ref_1' => 'required',
            'telefono_ref_1' => 'required',
            'nombre_ref_2' => 'required',
            'telefono_ref_2' => 'required',
        ])) {
            return (redirect()->to(base_url() . route_to('form_dealer'))->with('validate', dd($this->validator->getErrors()))->withInput());
        }
        $this->mdlFormDealer->insert([
            'name_form' => $this->request->getPost('nombres'),
            'surname_form' => $this->request->getPost('apellidos'),
            'type_identification_id' => $this->request->getPost('tipo_de_identificacion'),
            'number_identification_form' => $this->request->getPost('numero_de_identifiacion'),
            'celular_form' => $this->request->getPost('numero_celular'),
            'email_form' => $this->request->getPost('correo_electronico'),
            'ocupation_form' => $this->request->getPost('ocupacion'),
            'civil_status_id' => $this->request->getPost('estado_civil'),
            'adress_form' => $this->request->getPost('direccion'),
            'date_birth_form' => $this->request->getPost('fecha_de_nacimiento'),
            'city_id_form' => $this->request->getPost('ciudad'),
            'quest2' => $this->request->getPost('pregunta_2'),
            'quest3' => $this->request->getPost('pregunta_3'),
            'quest4' => $this->request->getPost('pregunta_4'),
            'name_ref_1' => $this->request->getPost('nombre_ref_1'),
            'tel_ref_1' => $this->request->getPost('telefono_ref_1'),
            'name_ref_2' => $this->request->getPost('nombre_ref_2'),
            'tel_ref_2' => $this->request->getPost('telefono_ref_2'),
        ]);

        session()->set([
            'form_completed' => true,
        ]);
        return  redirect()->to(base_url() . route_to('form_dealer'));
    }

    function getRealIP()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }
}
