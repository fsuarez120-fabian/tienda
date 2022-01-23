<?php

namespace App\Controllers;

use App\Entities\Payments;
use App\Models\OrderModel;
use App\Models\TransactionModel;

class Home extends BaseController
{

	public function index()
	{
		if ($this->request->getGet('enabelmodal')) {
			$enabelmodal = $this->request->getGet('enabelmodal');
		} else {
			$enabelmodal = 0;
		}

		$data = array(
			'enabelmodal' => $enabelmodal
		);
		return view('structure/header')
			. view('structure/navbar')
			. view('contents/home', $data)
			. view('structure/footer');
	}

	public function termandcoditions()
	{
		return view('structure/header')
			. view('structure/navbarcontent')
			. view('politics/termsandconditions')
			. view('structure/footer');
	}
	public function warrantypolicies()
	{
		return view('structure/header')
			. view('structure/navbarcontent')
			. view('politics/warrantypolicies')
			. view('structure/footer');
	}

	public function requestpayment()
	{
		$Payment = new Payments();
		$ApiKey = $Payment->getApiKey();
		$merchant_id =  $_REQUEST['merchantId'];
		$referenceCode =  $_REQUEST['referenceCode'];
		$TX_VALUE = $_REQUEST['TX_VALUE'];
		$New_value = number_format($TX_VALUE, 1, '.', '');
		$currency = $_REQUEST['currency'];
		$transactionState = $_REQUEST['transactionState'];
		$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
		$firmacreada = md5($firma_cadena);
		$firma = $_REQUEST['signature'];
		$reference_pol = $_REQUEST['reference_pol'];
		$cus = $_REQUEST['cus'];
		$extra1 = $_REQUEST['description'];
		$pseBank = $_REQUEST['pseBank'];
		$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
		$transactionId = $_REQUEST['transactionId'];

		if ($_REQUEST['transactionState'] == 4) {
			$estadoTx = "Transacción aprobada";
		} else if ($_REQUEST['transactionState'] == 6) {
			$estadoTx = "Transacción rechazada";
		} else if ($_REQUEST['transactionState'] == 104) {
			$estadoTx = "Error";
		} else if ($_REQUEST['transactionState'] == 7) {
			$estadoTx = "Transacción pendiente";
		} else {
			$estadoTx = $_REQUEST['mensaje'];
		}


		if (strtoupper($firma) == strtoupper($firmacreada)) {
			$data = array(
				'estadoTx' => $estadoTx,
				'transactionId' => $transactionId,
				'reference_pol' => $reference_pol,
				'referenceCode' => $referenceCode,
				'cus' => $cus,
				'pseBank' => $pseBank,
				'currency' => $currency,
				'extra1' => $extra1,
				'lapPaymentMethod' => $lapPaymentMethod,
				'TX_VALUE' => $TX_VALUE
			);
			return view('structure/header')
				. view('structure/navbarcontent')
				. view('payments/requestpaymentcheckout', $data)
				. view('structure/footer');
		} else {
			$templete = '
				<h1>Error validando firma digital.</h1>';
			print($templete);
		}
	}


	public function confirmationpagepayment()
	{

		$Payment = new Payments();
		$ApiKey = $Payment->getApiKey();

		//data received from payu
		$sign =  $_REQUEST['sign'];
		$merchant_id =  $_REQUEST['merchant_id'];
		$currency =  $_REQUEST['currency'];


		$transaction_id =  $_REQUEST['transaction_id']; //id de la transaccion
		$reference_sale =  $_REQUEST['reference_sale']; //referencia de la compra
		$state_pol =  $_REQUEST['state_pol']; //estado de la transaccion
		$reference_pol =  $_REQUEST['reference_pol']; //La referencia o número de la transacción generado en PayU.
		$value =  $_REQUEST['value']; //valor total de transaccion
		$transaction_date =  $_REQUEST['date']; //fecha de la transaccion
		$cus =  $_REQUEST['cus'];
		$pse_bank =  $_REQUEST['pse_bank'];
		$ip =  $_REQUEST['ip'];
		$payment_method_id =  $_REQUEST['payment_method_id']; //metodo de pago
		$response_message_pol =  $_REQUEST['response_message_pol'];
		$payment_method_name =  $_REQUEST['payment_method_name'];

		/*Si el segundo decimal del parámetro value es cero, ejemplo: 150.00
		El nuevo valor new_value para generar la firma debe ir con sólo un decimal así: 150.0.
		Si el segundo decimal del parámetro value es diferente a cero, ejemplo: 150.26
		El nuevo valor new_value para generar la firma debe ir con los dos decimales así: 150.26.*/

		if (number_format($value, 2, '.', '') == number_format($value, 1, '.', '')) {
			$New_value = number_format($value, 1, '.', '');
		} else {
			$New_value = number_format($value, 2, '.', '');
		}
		$key_sign = md5("$ApiKey~$merchant_id~$reference_sale~$New_value~$currency~$state_pol");
		//_________________________________________________________________________________

		$dataTransaction = array(
			'idtransaction' => $transaction_id, //$transaction_id,
			'reference_sale' => $reference_sale,
			'state_pol' => $state_pol,
			'reference_pol' => $reference_pol,
			'value' => $New_value,
			'transaction_date' => $transaction_date,
			'cus' => 	$cus,
			'pse_bank' => $pse_bank,
			'ip' => $ip,
			'payment_method_id' => $payment_method_id,
			'response_message_pol' => $response_message_pol,
			'payment_method_name' => $payment_method_name,
			'sign' => $sign,
			'key_sign' => $key_sign
		);
		$transactionModel = new TransactionModel(); // call model
		$transactionModel->insert($dataTransaction);


		if (strtoupper($sign) == strtoupper($key_sign)) {

			$orderModel = new OrderModel();

			switch ($state_pol) {
				case 4:
					$data = [
						'state_order' => 'APPROVED'
					];
					break;
				case 6:
					$data = [
						'state_order' => 'DECLINED'
					];
					break;
				case 5:
					$data = [
						'state_order' => 'EXPIRED'
					];
					break;
				default:
					$data = [
						'state_order' => 'ERROR-statepol-' . $state_pol
					];
			}
			$orderModel->update($reference_sale, $data);

			return true;
		}
	}
}
