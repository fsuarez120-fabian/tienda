<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdministratorModel;
use App\Models\CityModel;
use App\Models\OrderdetailsModel;
use App\Models\OrderModel;
use App\Models\TransactionModel;

class Order extends BaseController
{

    public function show_order()
    {
        if (!empty($this->request->getPost('date'))) {
            $date = $this->request->getPost('date');
        } else {
            $date =  date("Y") . '-' . date("m") . '-' . date("d");
        }
        $modelOrder = new OrderModel();
        $modleDetailOrder = new OrderdetailsModel();
        $orders = $modelOrder->getordersfordays($date);
        $allOrders = array();
        foreach ($orders as $order) {
            //determinar el nov¿mbre del destino
            $modelCity = new CityModel();
            $modelTransaction = new TransactionModel();
            $city = $modelCity->getcity($order['city_idcity']);

            $order = array_merge($order, ['destination' => [
                'city' => $city[0]['name_city'],
                'department' => $city[0]['name_department'],
            ]]);

            //agregar la lista a las order
            $list = $modleDetailOrder->getItemWithCategory($order['reference_order']);
            $order = array_merge($order, ['products' => array()]);
            $order['products'] = $list;

            //agregar la transaccion a la order
            $transations = $modelTransaction->getTransactionBy('reference_sale', $order['reference_order']);
            $order = array_merge($order, ['transactions' => array()]);
            $order['transactions'] = $transations;

            array_push($allOrders, $order);
        }

        $data = array(
            'orders' => $allOrders,
            'date' => $date
        );
        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/orders', $data)
            . view('adminpage/structure/footer');
    }

    public function showOrderWithStateFinal()
    {
        if (!empty($this->request->getPost('date'))) {
            $date = $this->request->getPost('date');
        } else {
            $date =  date("Y") . '-' . date("m") . '-' . date("d");
        }
        
        $modelOrder = new OrderModel();
        $modleDetailOrder = new OrderdetailsModel();
        $orders = $modelOrder->getOrderForTransactionFinished($date);
        $allOrders = array();
        foreach ($orders as $order) {
            //determinar el noviembre del destino
            $modelCity = new CityModel();
            $modelTransaction = new TransactionModel();
            $city = $modelCity->getcity($order['city_idcity']);

            $order = array_merge($order, ['destination' => [
                'city' => $city[0]['name_city'],
                'department' => $city[0]['name_department'],
            ]]);

            //agregar la lista a las order
            $list = $modleDetailOrder->getItemWithCategory($order['reference_order']);
            $order = array_merge($order, ['products' => array()]);
            $order['products'] = $list;

            //agregar la transaccion a la order
            $transations = $modelTransaction->getTransactionBy('reference_sale', $order['reference_order']);
            $order = array_merge($order, ['transactions' => array()]);
            $order['transactions'] = $transations;

            array_push($allOrders, $order);
        }

        $data = array(
            'orders' => $allOrders,
            'date' => $date
        );

        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/orders_only_transactions', $data)
            . view('adminpage/structure/footer');
    }
}
