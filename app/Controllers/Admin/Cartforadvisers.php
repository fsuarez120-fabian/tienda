<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LinkModel;
use App\Models\OrderdetailsModel;
use App\Models\OrderModel;
use App\Models\PermissionModel;
use App\Models\ShippinginfoModel;

class Cartforadvisers extends BaseController
{
    public function disableLink()
    {
        $reference = $this->request->getPost();
        //modelos
        $mdlLink = new LinkModel();
        $mdlOrder = new OrderModel();
        $mdlPermission = new PermissionModel();

        //si tiene permiso de update
        //si es link
        //si esta pendiente
        if ($mdlPermission->hasPermission(8)) {
            if ($mdlLink->isLink($reference)) {
                if ($mdlOrder->getState($reference) == 'PENDING') {
                    if ($mdlOrder->disableLink($reference)) {
                        return redirect()->route('admin_page_view_list_link');
                    } else {
                        echo "HUBO UN ERROR A LA HORA DE DESHABILITAR EL LINK";
                    }
                }
            }
        } else if ($mdlPermission->hasPermission(9)) {
            if ($mdlLink->getCedula($reference) == session()->idadministrator) {
                if ($mdlLink->isLink($reference)) {
                    if ($mdlOrder->getState($reference) == 'PENDING') {
                        if ($mdlOrder->disableLink($reference)) {
                            return redirect()->route('admin_page_view_list_link');
                        } else {
                            echo "HUBO UN ERROR A LA HORA DE DESHABILITAR EL LINK";
                        }
                    }
                }
            } else {
                return view('adminpage/structure/header')
                    . view('adminpage/structure/navbar')
                    . view('adminpage/structure/sidebar')
                    . view('errors/permission/donthavepermission')
                    . view('adminpage/structure/footer');
            }
        } else {
            return view('adminpage/structure/header')
                . view('adminpage/structure/navbar')
                . view('adminpage/structure/sidebar')
                . view('errors/permission/donthavepermission')
                . view('adminpage/structure/footer');
        }
    }


    public function viewListLinks()
    {
        if (!$this->request->getGet('id_identification')) {
            $cedula = session()->idadministrator;
        } else {
            $mdlPermission = new PermissionModel();
            if ($mdlPermission->hasPermission(10)) {
                $cedula = $this->request->getGet('id_identification');
            } else {
                $cedula = 'NO TIENES PERMISOS PARA BUSCAR CEDULAS DE OTROS USUARIOS';
            }
        }
        $modelLink = new LinkModel();
        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/cartforadvisers/list_links', [
                'listlinks' => $modelLink->getLinkBy('admin_link', $cedula),
                'cedula' => $cedula
            ])
            . view('adminpage/structure/footer');
    }


    public function viewCreateLink()
    {
        if (isset($_SESSION['shoppingcart'])) {
            $cart = $_SESSION['shoppingcart'];
        } else {
            $cart = array();
        }

        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/cartforadvisers/create_link', [
                'cart' => $cart
            ])
            . view('adminpage/structure/footer');
    }

    public function createLink()
    {
        $REFERENCE = date("Y") . '-' . date("m") . '-' . date("d") . '-' . time();

        //Save information of the order
        $dataShipInfo = array(
            'idshipinfo' => $REFERENCE,
            'city_idcity' => 442,
            'address_shippinginfo' => '',
            'neighborhood_shippinginfo' => '',
            'name_shippinginfo' => '',
            'surname_shippinginfo' => '',
            'typeid_shippinginfo' => '',
            'number_id_shippinginfo' => '',
            'number_phone_shippinginfo' => '',
            'email_shippinginfo' => ''
        );
        $shipinfoModel = new ShippinginfoModel(); //Call model
        $shipinfoModel->insert($dataShipInfo); //Ejecute function insert

        $totalProducts = 0; //Variable para calcular el total de productos
        if (empty($_SESSION['shoppingcart'])) {
            return redirect()->route('admin_page_view_create_link');
        }
        foreach ($_SESSION['shoppingcart'] as $product) {
            $totalProducts = $totalProducts + $product['price'] * $product['quantity'];
        }
        $freight = 0;

        $orderModel = new OrderModel();
        $dataOrder = array(
            'reference_order' => $REFERENCE,
            'date_order' => date("Y") . '-' . date("m") . '-' . date("d"),
            'product_price_order' => $totalProducts,
            'freight_price_order' => $freight,
            'total_price_order' => $totalProducts + $freight,
            'state_order' => 'PENDING',
            'shippinginfo_idshipinfo' => $REFERENCE,
            'consecutive_order' => (count($orderModel->findAll()) + 1)
        );

        $orderModel->insert($dataOrder);

        //Guardar los items de las ordenes
        $detailorderModel = new OrderdetailsModel();
        foreach ($_SESSION['shoppingcart'] as $product) {
            $dataItemOrder = array(
                'order_reference_order' => $REFERENCE,
                'product_reference' => $product['reference'],
                'product_category_idcategory' => $product['idcategory'],
                'size_idsize' => $product['size'],
                'quantity_orderdetails' => $product['quantity'],
                'unit_price_orderdetails' => $product['price'],
                'observation_orderdetails' => $product['observation'],
                'horma_orderdetails' => $product['horma']
            );
            $detailorderModel->insert($dataItemOrder);
        }


        //Cerrar las sessiones
        $session = session();
        $sessions = ['shoppingcart', 'shippinginformation'];
        $session->remove($sessions);

        //insertar el registro en la tabla de link

        $modelLink = new LinkModel();


        $link = [
            'id_link' => '',
            'url_link' => base_url() . "/carrito/" . $REFERENCE,
            'order_link' => $REFERENCE,
            'date_link' => date("Y") . '-' . date("m") . '-' . date("d"),
            'hour_link' => date("H:i:s"),
            'admin_link' => session()->idadministrator
        ];
        $modelLink->insert($link);

        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/cartforadvisers/finished_link', [
                'link' => $link
            ])
            . view('adminpage/structure/footer');
    }
}
