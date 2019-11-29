<?php

function discountValue($code){
	if(!$code || $code === null) {
		return false;
	}
	return \TTSoft\Promotions\Entities\Discount::where('code',$code)->first();
}