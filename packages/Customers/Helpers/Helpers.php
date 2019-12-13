<?php 
use TTSoft\Customers\Entities\Customer;

	function get_customer_name_by_id($id){
        $data = Customer::find($id);
        if (!$data) {
            abort(404);
        }
       return $data->getTitle();
    }

    function get_customer_list(){
        $data = Customer::all();
        if (!$data) {
            abort(404);
        }
       return $data;
    }