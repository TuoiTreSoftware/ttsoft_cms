<?php

namespace TTSoft\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use TTSoft\Inventories\Entities\Voucher;
use TTSoft\AlepayPayment\Services\Alepay;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingOrder extends Voucher
{
    // đơn hàng bán model
    
    CONST PREFIX = 'BH';

    CONST ORDER_ONLINE = 1; //đơn hàng mua từ frontend
    CONST ORDER_ADMIN = 2;  //đơn hàng nhập từ admin

    CONST PAYMENT_METHOD = [
        'COD' => 'Thanh toán tiền mặt - COD',
        'chuyen_khoan_ngan_hang' => 'Chuyển khoản ngân hàng',
        'credit_cart' => 'Alepay (Visa / Master Card)',
    ];


    CONST PYPE_CLASS = [
        0  => 'warning', 
        1 =>  'danger', 
        2 => 'success',
    ];

    CONST PYPE_PAYMENT = [
        0  => 'Chờ thanh toán', 
        1 =>  'Alepay Failed', 
        2 => ' Alepay Success',
    ];

    protected $attributes = [
        'prefix' => self::PREFIX
    ];

    /* get all model */
    public static function findAll(){
        $data = self::where('prefix',self::PREFIX)->whereNull('deleted_at')->orderBy('id','DESC')->get();
        return $data;
    }
    public static function findbyCustomerid($id){
        $data = self::where('prefix',self::PREFIX)->where('customer_id',$id)->whereNull('deleted_at')->orderBy('id','DESC');
        return $data;
    }
    /* find by id model */
    public static function findById($id){
        $data = self::find($id);
        if (!$data) {
            abort(404);
        }
        return $data;
    }

    public static function getPaginate($page = 10){
        $data = self::where('prefix',self::PREFIX)->orderBy("id","DESC")->paginate($page);
        return $data;
    }


    public function createDocs($data){
        $data['prefix'] = self::PREFIX;
        $docs = self::create($data);
        if ($docs) {
            return $docs;
        }
        return null;
    }

    public function getDocHeadersTitle(){
        $cate = $this->doc_details()->first();
        return $cate ? $cate->getTitle() : null;
    }

    public function setPrefixAttribute(){
       $this->attributes['prefix'] = self::PREFIX;
    }

    public function sumOrder(){
        return $this->doc_details()->sum('gia_tri');
    }

    public function getPaymentInfo(){
        if($this->payment_method == "credit_cart"){
            $alepay = new Alepay();
            $response = $alepay->getTransactionInfoByOrderCode($this->doc_code);
            $data = json_decode($response);
            if($data->dataCount == 0){
                return false;
            } else {
                return $data->data[0];
            }
        }
    }

    public function getPaymentClass(){
        if($this->payment_method != "credit_cart"){
            return $this->type_pay;
        }
        if($this->getPaymentInfo()){
            if($this->getPaymentInfo()->amount > 0 && $this->getPaymentInfo()->amount == $this->sumOrder()){
                return 2;
            }
        }else{
            return 0;
        }
    }
}
