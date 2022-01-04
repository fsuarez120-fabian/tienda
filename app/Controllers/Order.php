<?php

namespace App\Controllers;

use App\Models\OrderdetailsModel;
use App\Models\OrderModel;
use App\Models\ShippinginfoModel;

class Order extends BaseController
{
    public function index()
    {
        return view('structure/header')
            . view('structure/navbar')
            . view('contents/home')
            . view('structure/footer');
    }
    
 /*   public function saveOrder()
    {

        if ( !empty($_SESSION['shoppingcart']) && !empty($_SESSION['shippinginformation'])) {
           

            $REFERENCE = $_SESSION['shippinginformation']['referencecode'];

            //Save information of the order
            $dataShipInfo = array(
                'idshipinfo' => $REFERENCE,
                'city_idcity' => $_SESSION['shippinginformation']['city'],
                'address_shippinginfo' => $_SESSION['shippinginformation']['adress'],
                'neighborhood_shippinginfo' => $_SESSION['shippinginformation']['neighborhood'],
                'name_shippinginfo' => $_SESSION['shippinginformation']['name'],
                'surname_shippinginfo' => $_SESSION['shippinginformation']['surname'],
                'typeid_shippinginfo' => $_SESSION['shippinginformation']['typeid'],
                'number_id_shippinginfo' => $_SESSION['shippinginformation']['numberid'],
                'number_phone_shippinginfo' => $_SESSION['shippinginformation']['numphone'],
                'email_shippinginfo' => $_SESSION['shippinginformation']['email']
            );
            $shipinfoModel = new ShippinginfoModel(); // call model
            $shipinfoModel->insert($dataShipInfo); //ejecute function insert
            //save----------------------

            $totalProducts = 0; //variable para calcular el total de productos
            foreach ($_SESSION['shoppingcart'] as $product) {
                $totalProducts = $totalProducts + $product['price'] * $product['quantity'];
            }
           
            $orderModel = new OrderModel();
            $dataOrder = array(
                'reference_order' => $REFERENCE,
                'date_order' => date("Y") . '-' . date("m") . '-' . date("d"),
                'product_price_order' => $totalProducts,
                'freight_price_order' => $_SESSION['shippinginformation']['freight'],
                'total_price_order' => $totalProducts + $_SESSION['shippinginformation']['freight'],
                'state_order' => 'PENDING',
                'shippinginfo_idshipinfo' => $REFERENCE,
                'consecutive_order' => (count($orderModel->findAll())+1)
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
            $this->session->destroy();
            return true;
        } else {
            return false;
        }
    }*/
    
}
