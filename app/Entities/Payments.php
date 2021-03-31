<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Payments extends Entity
{
    private $URL = 'https://checkout.payulatam.com/ppp-web-gateway-payu';
    private $MERCHANT_ID = 895629;
    private $ACCOUNT_ID = 902214;
    private $API_KEY = 's7X4V8wi4Rc3th3U6H7W2LaAZ0';

    private $DESCRIPTION = "Productos PeRa DK";
    private $CURRENCY = 'COP';
    private $TEST = 0;
    private $RESPONSE_URL = 'https://www.tienda.peradk.com/requestpayment';
    private $CONFIRMATION_URL = 'https://www.tienda.peradk.com/confirmationpage';
    
 
    public function getUrl()
    {
        return $this->URL;
    }
    public function getMerchantId()
    {
        return $this->MERCHANT_ID;
    }
    public function getAccountId()
    {
        return $this->ACCOUNT_ID;
    }
    public function getApiKey()
    {
        return $this->API_KEY;
    }
    public function getDescription()
    {
        return $this->DESCRIPTION;
    }
    public function getCurrency()
    {
        return $this->CURRENCY;
    }
    public function getTest()
    {
        return $this->TEST;
    }
    public function getResponseUrl()
    {
        return $this->RESPONSE_URL;
    }
    public function getConfirmationUrl()
    {
        return $this->CONFIRMATION_URL;
    }

    public function generateSignature($REFERENCE_CODE, $AMOUNT)
    {
        //“ApiKey~merchantId~referenceCode~amount~currency”.
        return md5($this->API_KEY . '~' . $this->MERCHANT_ID . '~' . $REFERENCE_CODE . '~' . $AMOUNT . '~' . $this->CURRENCY);
    }
}
