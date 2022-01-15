<?php

namespace App\Controllers;

use App\Models\Admin\PedidoModel;
use App\Models\CivilStatusModel;
use App\Models\CodigomotoModel;
use App\Models\DepartamentModel;
use App\Models\SorteoModel;
use App\Models\TypeIdentificationModel;

class Dealer extends BaseController
{
    public function __construct()
    {
        $this->mdlCode = new CodigomotoModel();
        $this->mdlTypeIdentification = new TypeIdentificationModel();
        $this->mdlCivilStatus = new CivilStatusModel();
        $this->mdldepartments = new DepartamentModel();
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
        d($this->request->getPostGet());
        if (!$this->validate([
            'nombres'    =>  'required',
            'apellidos' => 'required',
            'tipo_de_identificacion' => 'required|is_not_unique[type_identification.id_type_identification]',
            'numero_de_identifiacion' => 'required|numeric',
            'numero_celular' => 'required|numeric',
            'correo_electronico' => 'required|valid_email',
            'ocupacion' => 'required',
            'estado_civil' => 'required|is_not_unique[civil_status.id_civil_status]',
            'direccion' => 'required',
            'fecha_de_nacimiento' => 'required|valid_date[Y/m/d]',
            'ciudad' => 'required|is_not_unique[city.idcity]',
            'pregunta_2' => 'required',
            'pregunta_3' => 'required',
            'pregunta_4' => 'required',
            'nombre_ref_1' => 'required',
            'telefono_ref_1' => 'required|numeric',
            'nombre_ref_2' => 'required',
            'telefono_ref_2' => 'required|numeric',
        ])) {
            return (redirect()->to(base_url().route_to('form_dealer'))->with('validate', dd($this->validator->getErrors()))->withInput());
        }
        return;
    }

    public function registerSorteo()
    {
        //validaciones de los campos
        if (!$this->validate([
            'code'    => [
                'rules'  => 'required|is_not_unique[codigosmoto.codigo_codigo]',
                'errors' => [
                    'required' => 'El codigo es requerido.',
                    'is_not_unique' => 'El código no es válido.'
                ]
            ],
            'cedula'    => [
                'rules'  => 'required|is_not_unique[codigosmoto.cliente_codigo]',
                'errors' => [
                    'required' => 'La cedula es requerida.',
                    'is_not_unique' => 'La cedula del cliente no existe.'
                ]
            ],
        ])) {
            return redirect()->to(base_url())->with('validate', $this->validator->getErrors())->withInput();
        }

        //datos recibidos del formulario de inscription
        $code = $this->request->getPost('code');
        $cedula = $this->request->getPost('cedula');

        if ($codeobject = $this->mdlCode->where('codigo_codigo', $code)->where('cliente_codigo', $cedula)->first()) {
            if ($codeobject['active'] == true) {
                return redirect()->to(base_url())->with('msg', 'PeRa Amiguis, ya utilizaste el código, ya estas participando');
            } else {
                $this->mdlCode->update($codeobject['id_codigosmoto'], [
                    'active' => 1,
                    'ip_codigo' => $this->getRealIP()
                ]);
                return view('sorteos/headersorteo')
                    . view('structure/navbarcontent')
                    . View('sorteos/success', ['code' => $code, 'cedula' => $cedula])
                    . view('sorteos/footersorteo');
            }
        } else {
            return redirect()->to(base_url())->with('errors', 'No existe el código ingresado')->withInput();
        }
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
