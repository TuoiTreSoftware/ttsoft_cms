<?php

namespace TTSoft\AlepayPayment\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\AlepayPayment\Repositories\AlepayPaymentRepositoryInterface;
use TTSoft\AlepayPayment\Services\Alepay;
class AlepayPaymentController extends Controller
{
	public function test(){
		$params = array(
                  'amount' =>  '500000',
                  'buyerAddress' =>  'Thanh Binh, Vung Liem, Vinh Long',
                  'buyerCity' =>  'TP. Hồ Chí Minh',
                  'buyerCountry' =>  'Việt Nam',
                  'buyerEmail' =>  'nguyentandat43@gmail.com',
                  'buyerName' =>  'TesT',
                  'buyerPhone' =>  '0388912317',
                  'cancelUrl' =>  route('alepay.callback.url.cancel'),
                  'currency' =>  'VND',
                  'orderCode' =>  ' BH20192101',
                  'orderDescription' =>  'Don hang Vkspa.vn',
                  'paymentHours' =>  '5',
                  'returnUrl' =>   route('alepay.callback.url.callback'),
                  'totalItem' =>  '1',
                  'checkoutType' =>  1,
              );
		$alepay = new Alepay();
		$response = $alepay->getTransactionInfoByOrderCode("đ");
		$data = json_decode($response);
            dd($data->dataCount);
		//return $data;
	}

	public function callback(Request $request){
		//dd($request->all());
	}

	public function cancel(){
		dd('ban da huy don hang');
	}
}