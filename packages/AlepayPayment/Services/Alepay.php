<?php

namespace TTSoft\AlepayPayment\Services;

require_once(__DIR__.'/Alepay/Utils/AlepayUtils.php');


class Alepay
{
    protected $token_key;

    protected $checksum_key;

    protected $encrypt_key;

    protected $base_url;



    protected $URI = [
        'requestPayment' => '/checkout/v1/request-order',
        'calculateFee' => '/checkout/v1/calculate-fee',
        'getTransactionInfo' => '/checkout/v1/get-transaction-info',
        'getTransactionHistory' => '/checkout/v1/get-transaction-history ',
        'requestCardLink' => '/checkout/v1/request-profile',
        'tokenizationPayment' => '/checkout/v1/request-tokenization-payment',
        'cancelCardLink' => '/checkout/v1/cancel-profile'
    ];

    public function __construct(){
        $this->alepayUtils = new \AlepayUtils();
        $this->token_key = config('alepaypayment.alepay.token_key');
        $this->checksum_key = config('alepaypayment.alepay.checksum_key');
        $this->encrypt_key = config('alepaypayment.alepay.encrypt_key');
        $this->base_url = config('alepaypayment.alepay.base_url');
    }

    //send request to Alepay
    private function sendRequestToAlepay($data, $url){
        $dataEncrypt = $this->alepayUtils->encryptData(json_encode($data), $this->encrypt_key);
        $checksum = md5($dataEncrypt . $this->checksum_key);
        $items = array(
            'token' => $this->token_key,
            'data' => $dataEncrypt ,
            'checksum' => $checksum
        );
        $data_string = json_encode($items);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        return json_decode($result);
    }

    //Tao don hang moi
    public function sendOrderToAlepay($data) {
        $url = $this->base_url . $this->URI['requestPayment'];
        $result = $this->sendRequestToAlepay($data, $url);
        if($result->errorCode == '000'){
            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->encrypt_key);
            return $dataDecrypted;
        } else {
            return json_encode($result);
        }
    }


    //thanh toan via VISA/Mastercard
    public function getTransactionInfo($transactionCode){
        $data = array('transactionCode' => $transactionCode );
        $url = $this->base_url . $this->URI['getTransactionInfo'];
        $result = $this->sendRequestToAlepay($data, $url);
        if($result->errorCode == '000'){
            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->encrypt_key);
            return ($dataDecrypted);
        } else {
            return ($result);
        }
    }

    /*
     * get transaction info from Alepay
     * @param array|null $data
     */
    public function getTransactionInfoByOrderCode($orderCode){
        
        // demo data
        $data = array('orderCode' => $orderCode);
        $url = $this->base_url . $this->URI['getTransactionHistory'];
        $result = $this->sendRequestToAlepay($data, $url);
        if($result->errorCode == '000'){
            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->encrypt_key);
            return $dataDecrypted;
        } else {
            return json_encode($result);
        }
    }

    // thanh toan chuyen trang san alepay
    public function sendTokenizationPayment($data){
        $url = $this->base_url . $this->URI['tokenizationPayment'];
        $result = $this->sendRequestToAlepay($data, $url);
        if($result->errorCode == '000'){
            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->encrypt_key);
            return ($dataDecrypted);
        } else {
            return ($result);
        }
    }

}
