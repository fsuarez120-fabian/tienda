<?php

namespace App\Controllers;

use App\Entities\Payments;
use App\Models\CityModel;
use App\Models\DepartamentModel;
use App\Models\OrderdetailsModel;
use App\Models\OrderModel;
use App\Models\ServientregaModel;
use App\Models\ShippinginfoModel;
use App\Models\TransactionModel;

class Cartforadvisers extends BaseController
{
    public function cartReference($reference)
    {
        $modelDetailIOrder = new OrderdetailsModel();
        $modelDepart = new DepartamentModel();
        $modelTransactions = new TransactionModel();



        return view('structure/header')
            . view('structure/navbarcontent')
            . view('contents/shoppingcart_advisers', [
                'listproducts' => $modelDetailIOrder->getItemWithCategoryAndProduct($reference),
                'departments' =>  $modelDepart->findAll(),
                'reference' => $reference,
                'transactions' => $modelTransactions->getTransactionBy('reference_sale', $reference)
            ])
            . view('structure/footer');
    }

    public function saveShippingInformation() //resive informacion de un formulario para guardar en la base de datos
    {
        //validaciones del formulario
        /*if (!$this->validate([
            'city' => 'required|is_not_unique[city.idcity]',
            'adress' => 'alpha_numeric_punct|required',
            'neighborhood' => 'alpha_numeric_punct|required',
            'name' => 'required|alpha_numeric_punct',
            'surname' => 'required|alpha_numeric_punct',
            'numberid' => 'required|is_natural',
            'numphone' => 'required|is_natural',
            'email' => 'required|valid_email'
        ])) {
            return redirect()->back()->with('validate_form_cart_advisers', $this->validator->getErrors())->withInput();
        }*/
        if (!$REFERENCE = $this->request->getPost('reference')) {
            echo "NO RECIBIMOS UNA REFERENCIA";
            return;
        }
        $mode = new CityModel();
        $cityfound = $mode->getcity($this->request->getPost('city'));

        $modellistproduct = new OrderdetailsModel();
        $listofProducts = $modellistproduct->where('order_reference_order', $REFERENCE)->findAll();

        $information = array(
            'referencecode' => $REFERENCE,
            'department' => $cityfound[0]['department_city'],
            'city' => $cityfound[0]['idcity'],
            'adress' => $this->request->getPost('adress'),
            'neighborhood' => $this->request->getPost('neighborhood'),
            'name' => $this->request->getPost('name'),
            'surname' => $this->request->getPost('surname'),
            'typeid' => $this->request->getPost('typeid'),
            'numberid' => $this->request->getPost('numberid'),
            'numphone' => $this->request->getPost('numphone'),
            'email' => $this->request->getPost('email'),
            'freight' => $this->calculatefreight($cityfound[0]['idcity'], $listofProducts),
            'name_department' => $cityfound[0]['name_department'],
            'name_city' => $cityfound[0]['name_city']
        );

        //Se trae la informacion del pedido que esta en la base de datos.
        $modelOrder = new OrderModel();
        if (!$order = $modelOrder->find($REFERENCE)) {
            echo "EL PEDIDO NO EXISTE";
            return;
        }

        $order['freight_price_order'] = $information['freight'];
        $order['total_price_order'] = $order['total_price_order'] + $order['freight_price_order'];
        $modelOrder->update($REFERENCE, $order);

        //Se modifica los datos de envio en la tabla ya que estos deben estar vacios.
        $modelShipping = new ShippinginfoModel();
        if (!$info = $modelShipping->find($REFERENCE)) {
            echo "HUBO UN ERROR CON EL LINK, CONTACTANOS";
        }
        $info['city_idcity'] = $information['city'];
        $info['address_shippinginfo'] = $information['adress'];
        $info['neighborhood_shippinginfo'] = $information['neighborhood'];
        $info['name_shippinginfo'] = $information['name'];
        $info['surname_shippinginfo'] = $information['surname'];
        $info['typeid_shippinginfo'] = $information['typeid'];
        $info['number_id_shippinginfo'] = $information['numberid'];
        $info['number_phone_shippinginfo'] = $information['numphone'];
        $info['email_shippinginfo'] = $information['email'];
        $modelShipping->update($REFERENCE, $info);


        //CONSTANTES WEBCHECKOUT PAYU
        $REFERENCE_CODE =  $REFERENCE;
        $AMOUNT = $order['total_price_order'];
        $TAX = $this->generateTax($listofProducts)['Tax'];
        $TAX_RETURN_BASE = $this->generateTax($listofProducts)['TaXReturnBase'];
        $BUYEREMAIL = $info['email_shippinginfo'];
        $BUYER_FULLNAME =  $info['name_shippinginfo'] . ' ' . $info['surname_shippinginfo'];
        $PAYER_DOCUMENT = $info['number_id_shippinginfo'];
        $MOBILE_PHONE = $info['number_phone_shippinginfo'];
        $payment = new Payments();

        return view('structure/header')
            . view('structure/navbarcontent')
            . view('adminpage/contents/cartforadvisers/finalize_purchase_link', [
                'information' => $information,
                'payment' => [
                    'url' => $payment->getUrl(),
                    'merchantId' => $payment->getMerchantId(),
                    'accountId' => $payment->getAccountId(),
                    'description' => $payment->getDescription(),
                    'referenceCode' => $REFERENCE_CODE,
                    'amount' => $AMOUNT,
                    'tax' => $TAX,
                    'taxReturnBase' => $TAX_RETURN_BASE,
                    'currency' => $payment->getCurrency(),
                    'signature' => $payment->generateSignature($REFERENCE_CODE, $AMOUNT),
                    'test' => $payment->getTest(),
                    'buyerEmail' => $BUYEREMAIL,
                    'responseUrl' => $payment->getResponseUrl(),
                    'confirmationUrl' => $payment->getConfirmationUrl(),
                    'buyerFullName' => $BUYER_FULLNAME,
                    'payerDocument' => $PAYER_DOCUMENT,
                    'mobilePhone' => $MOBILE_PHONE,
                    'payerEmail' => $BUYEREMAIL,
                    'payerMobilePhone' => $MOBILE_PHONE,
                    'payerFullName' => $BUYER_FULLNAME
                ],
                'reference' => $REFERENCE_CODE,
                'cart' => $listofProducts,
                'flete' => $information['freight']
            ])
            . view('structure/footer');
    }
    public function generateTax($listofProducts)
    {
        $totaToGetIVA = 0;
        foreach ($listofProducts as $item) {
            if ($item['product_category_idcategory'] == 14) {
                $totaToGetIVA = $totaToGetIVA;
            } else {
                $totaToGetIVA = $totaToGetIVA + ($item['unit_price_orderdetails'] * $item['quantity_orderdetails']);
            }
        }
        return array(
            'Tax' => number_format($totaToGetIVA - ($totaToGetIVA / 1.19), 2, '.', ''),
            'TaXReturnBase' => number_format(($totaToGetIVA / 1.19), 2, '.', '')
        );
    }
    public function calculatefreight($citydestination, $listofProducts) //OJO TENER EN CUENTA QUE ESTE METODO ESTA EN EL CONTROLADOR DE PRODUCT DEBEN SER IGUALES
    {
        $ORIGIN_CITY = 442;
        $modelServientrega = new ServientregaModel();
        $servientrega = $modelServientrega->getjourneyandprice($ORIGIN_CITY, $citydestination);
        $counter_tap = 0;
        $counter_products = 0;
        $counter_socks = 0;
        $counter_rizos = 0;

        foreach ($listofProducts as $item) {
            $counter_products = $counter_products + $item['quantity_orderdetails'];
            if ($item['product_category_idcategory'] == 14) {
                $counter_tap +=  $item['quantity_orderdetails'];
            }
            if ($item['product_category_idcategory'] == 5) {
                $counter_socks +=  $item['quantity_orderdetails'];
            }
            if ($item['product_category_idcategory'] == 6) {
                $counter_rizos +=  $item['quantity_orderdetails'];
            }
        }
        if ($counter_tap < 6 && $counter_products == $counter_tap + $counter_socks) {
            return $servientrega[0]['price_typejourney'];
        } else if ($counter_rizos <= 1 && $counter_rizos == $counter_products) {
            return $servientrega[0]['price_typejourney'];
        } else {
            return 0;
        }
    }
}
