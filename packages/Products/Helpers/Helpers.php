<?php
use TTSoft\Base\Entities\LangContent;

function getTitleCate($type_id)
{
	$cate = DB::table('categories')->where('id',$type_id)->first();
	echo '<input type="text" id="example-text" readonly name="type_id" class="form-control " value="'.$cate->name.'" >';
}

function getOptCate($cateId = null)
{
	$cate = DB::table('product_categories')->get();
	foreach ($cate as $key => $val) {
		$selected = ($val->id == old('product_producer_id')) ? 'selected' : null;
		if ($cateId !== null) {
			$selected = ($val->id == $cateId) ? 'selected' : null;
		}
		echo '<option value="'.$val->id.'" '.$selected.'>'.$val->title.'</option>';
	}
} 

function getEditOptCate($type_id)
{
	$cate = DB::table('product_categories')->get();
	foreach ($cate as $key => $val) {
		if($val->id==$type_id){
			echo '<option value="'.$val->id.'" selected="selected">'.$val->title.'</option>';
		}else{
			echo '<option value="'.$val->id.'">'.$val->title.'</option>';
		}
	}
}

function getOptProducer($cateId = null)
{
	$producer = DB::table('product_producers')->get();
	foreach ($producer as $key => $val) {
		$selected = ($val->id == old('product_producer_id')) ? 'selected' : null;
		if ($cateId !== null) {
			$selected = ($val->id == $cateId) ? 'selected' : null;
		}
		echo '<option value="'.$val->id.'" '.$selected.'>'.$val->title.'</option>';
	}
}

function getEditOptProducer($product_producer_id)
{
	$producer = DB::table('product_producers')->get();
	foreach ($producer as $key => $val) {
		if($val->id==$product_producer_id){
			echo '<option value="'.$val->id.'" selected="selected">'.$val->title.'</option>';
		}else{
			echo '<option value="'.$val->id.'">'.$val->title.'</option>';
		}
	}
}

function getListVatTuHangHoa_ByCate_Id($id){
	$data = TTSoft\Products\Entities\Product::where('product_category_id',$id)->whereIn('type_id',[TTSoft\Categories\Entities\Category::VATTU,TTSoft\Categories\Entities\Category::HANGHOA])->get();
	if (!$data) {
		abort(404);
	}
	return $data;
}

function getListVatTuHangHoa(){
	$data = TTSoft\Products\Entities\Product::whereIn('type_id',[TTSoft\Categories\Entities\Category::VATTU,TTSoft\Categories\Entities\Category::HANGHOA])->get();
	if (!$data) {
		abort(404);
	}
	return $data;
}


if (!function_exists('get_language_product')) {
	function get_language_product($lang , $product_id){
		$content = LangContent::where('content_type',LangContent::CONTENT_TYPE_PRODUCT)
								->where('table_name',$product_id)
								->where('lang',$lang)
								->latest("created_at")
								->count();
		return $content;
	}
}
function getProductBestSelling($id,$limit){
	$data = TTSoft\Products\Entities\Product::orderBy('created_at','DESC')
		->where('product_category_id',$id)
		->paginate($limit);
	return $data;
}
function get_id_category_product(){
	$data = TTSoft\Products\Entities\ProductCate::orderBy('created_at','DESC')->get();
	return $data;
}
function getProduct(){
	$data = TTSoft\Products\Entities\Product::orderBy('created_at','DESC')
	->get();
	return $data;
}
function getProductid($id){
	$data = TTSoft\Products\Entities\Product::orderBy('created_at','DESC')->where('id',$id)
	->get();
	return $data;
}
function getProductnoibat($limit){
	$data = TTSoft\Products\Entities\Product::orderBy('created_at','DESC')->
			limit($limit)->get();
	return $data;
}
function get_attribute_category($lang , $str='', $id=0, $selected=''){
	$data = TTSoft\Products\Entities\Attribute::where('parent_id',$id)->get();
	foreach($data as  $val)
	{
		$id = $val->id;
		$name = $val->getTitle();
		if ($val->id == $selected) {
			echo "<option value = '$id' selected=''>$str $name</option>";
		}else{
			echo "<option value = '$id'>$str $name</option>";
		get_product_category($lang , $str.'-', $id, $selected);}
	}
}


if (!function_exists('attrs')) {
	function attrs($attributes){
		$arrays = [];
		foreach ($attributes as $key => $value) {
			$childAttr = \TTSoft\Products\Entities\Attribute::selectRaw('id,title')
				->where(['parent_id' => $value->id, 'status' => 1])
				->get();
			$arrays[$key]['parent'] = ['id' => $value->id,'title' => $value->title];
			$arrays[$key]['attrs'] = $childAttr;
		}
		return $arrays;
	}
}

