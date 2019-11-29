<?php 
	function get_customer_name_by_id($id){
        $data = \TTSoft\Customers\Entities\Customer::find($id);
        if (!$data) {
            abort(404);
        }
       return $data->getTitle();
    }

    function get_customer_list(){
        $data = \TTSoft\Customers\Entities\Customer::all();
        if (!$data) {
            abort(404);
        }
       return $data;
    }