<?php 
if (!function_exists('format_price')) {
	function format_price($price , $symbol = 'vnd'){
		return number_format($price,0,'.',',')."vnđ";
	}
}
function getTotalDetailsById($id){
	$data = TTSoft\Inventories\Entities\VoucherDetail::where('id',$id)->first();
	$so_luong = $data->quantity;
	$don_gia = $data->gia_tri;
	$Total = $so_luong * $don_gia;
	return format_price($Total)." vnđ";
}
function getTotalDocHeadersById($id){
	$doc_details = TTSoft\Inventories\Entities\VoucherDetail::where('doc_headers_id',$id)->get();
	$sum = 0;
	$total = 0;
	foreach ($doc_details as $key => $value) {
		if($value->quantity != 0 && $value->gia_tri != 0){
			$so_luong = $value->quantity;
			$don_gia = $value->gia_tri;
			$sum = $so_luong * $don_gia * ($value->vat / 100 + 1);
			$total = $total + $sum ;
		}elseif ($value->quantity == 0 && $value->gia_tri == 0) {
			$gia_tri = $value->gia_tri;
			$gia_tri_vat = $value->gia_tri_vat;
			$sum = $gia_tri + $gia_tri_vat * ($value->vat / 100 + 1);
			$total = $total + $sum ;
		}
		
	}
	return format_price($total)." vnđ";
}

function get_name_product($kho_id){
	$product_id = TTSoft\Inventories\Entities\VoucherDetail::select('product_id')->where('kho_id',$kho_id)->groupBy('product_id')->get();
	return $product_id;
	
}
//lay ma sku product
function get_product_sku($product_id){
	$product = TTSoft\Products\Entities\Product::findById($product_id);
	return $product->sku;
}
// lay title product
function get_title($product_id){
	$product = TTSoft\Products\Entities\Product::findById($product_id);
	return $product->title;
}