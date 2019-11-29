<?php 
use TTSoft\Customers\Entities\Customer;
if(!function_exists('get_all_customers')){
	function get_all_customers(){
		$data = Customer::findAll();
		return $data;
	}
}


