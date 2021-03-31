<?php

namespace App\Controllers;

use App\Models\Admin\PedidoModel;
use App\Models\SorteoModel;
use CodeIgniter\Config\View;

class Sorteo extends BaseController
{
    public function sorteoMoto()
    {
        return view('sorteos/headersorteo')
            . view('sorteos/navbarsorteo')
            . view('sorteos/contentsorteo')
            . view('sorteos/footersorteo');
    }


    public function registerSorteo()
    {
        //validaciones de los campos
        if (!$this->validate([
            'id' => 'required|alpha_numeric_punct',
            'email' => 'required|valid_email',
            'term' => 'required'
        ])) {
            return redirect()->back()->with('validate', $this->validator->getErrors())->withInput();
        }

        //datos recibidos del formulario de inscription
        $idorder = $this->request->getPost('id');
        $email = $this->request->getPost('email');

        $modelPedidoAdmin = new PedidoModel();
        if (!($order = $modelPedidoAdmin->getPedido($idorder))) {
            return redirect()->back()->with('errors', 'PeRa Amiguis, el pedido no cumple las condiones!!!')->withInput();
        } else {
            if ($order['cli_email'] == $email) {
                $modelSorteo = new SorteoModel();
                if (!$modelSorteo->isCreated($idorder)) {
                    $data = [
                        'id_sorteo' => '',
                        'ip_sorteo' => $this->request->getIPAddress(),
                        'date_sorteo' => date("Y") . '-' . date("m") . '-' . date("d"),
                        'hour_sorteo' => date("H:i:s"),
                        'id_order_sorteo' => $idorder,
                        'email_sorteo' => $email,
                        'price_order_sorteo' => $order['ped_valor']
                    ];
                    $modelSorteo->insert($data);
                    return view('sorteos/headersorteo')
                        . view('structure/navbarcontent')
                        . View('sorteos/success', ['order' => $order])
                        . view('sorteos/footersorteo');
                } else {
                    return redirect()->back()->with('msg', 'Ya estas participando PeRa Amiguis, ya te habías registrado!!!')->withInput();
                }
            } else {
                return redirect()->back()->with('errors', 'El e-mail no corresponde al pedido que ingresaste PeRa Amiguis.')->withInput();
            }
        }
    }
}
