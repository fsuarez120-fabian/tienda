<?php

namespace App\Controllers;

use App\Models\Admin\PedidoModel;
use App\Models\CodigomotoModel;
use App\Models\SorteoModel;

class Sorteo extends BaseController
{
    public function __construct()
    {
        $this->mdlCode = new CodigomotoModel();
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
