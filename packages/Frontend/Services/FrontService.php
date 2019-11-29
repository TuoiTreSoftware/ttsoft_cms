<?php
namespace TTSoft\Frontend\Services;

class FrontService{

	public function convertDataCustomer($data){
		$data['sex'] = 1;
                $data['tax_code'] = 0000;
                $data['type_customer'] = 0;
                $full_name = explode(" ", $data['full_name']);
                $last_name = array_pop($full_name);
                $first_name = implode(" ", $full_name);
                $data['first_name'] = $first_name;
                $data['last_name'] = $last_name;
                $data['password'] = bcrypt('vkspa');
                $data['address'] = $data['address'].', '.$data['province'];
                unset($data['note'],$data['order_type'],$data['full_name'],$data['province'],$data['payment_method'],$data['discount']);
                return $data;
	}
}

