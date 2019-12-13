<?php
use TTSoft\Base\Entities\LangContent;
use TTSoft\Categories\Entities\Category;
use TTSoft\Categories\Entities\ProductCategory;

if (!function_exists('get_language_product_category')) {
	function get_language_product_category($lang , $post_id){
	    $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_PRODUCT_CATEGORY)
	        ->where('table_name',$post_id)
	        ->where('lang',$lang)
	        ->latest("created_at")
	        ->count();
	    return $content;
	}
}

function get_category_by_prefix($prefix, $str, $id, $selected){
	$data = Category::where('prefix',$prefix)->where('parent_id',$id)->get();
	foreach($data as  $val)
	{
		$id = $val->id;
		$name = $val->name;
		if ($val->id == $selected) {
			echo "<option value = '$id' selected=''>$str $name</option>";
		}else{
			echo "<option value = '$id'>$str $name</option>";
		get_category_by_prefix($prefix, $str.'-', $id, $selected);}
	}
}

function get_product_category($lang , $str='', $parent=0, $selected=''){
	$data = ProductCategory::getContentAll($lang)->where('parent_id',$parent)->get();
	foreach($data as  $val)
	{
		$id = $val->id;
		$name = $val->getTitle();
		if ($val->id == $selected) {
			echo "<option value = '$id' selected=''>$str $name </option>";
		}else{
			echo "<option value = '$id'>$str $name </option>";
		}
		get_product_category($lang , $str.'-', $id, $selected);
	}
}

function get_list_category($prefix, $str, $id){
	$data = Category::where('prefix',$prefix)->where('parent_id',$id)->get();
	foreach($data as  $val)
	{
		$id = $val->id;
		$name = $val->name;
		echo '<tr>
		<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
		<td><a href="#">'.$str.' '.$val->name.'</a></td>
		<td><span class="">'.$val->description.'</span> </td>
		<td><a href="'.route("categories.get.edit",$val->id).'" class="text-dark p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a href="'.route("categories.get.Delete", $val->id).'" class="text-dark" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
		</tr>';
		get_list_category($prefix, $str.'-', $id);
	}
	
}
//get tinh trang
function get_category_name_by_id($id){
	$data = Category::find($id);
	if (!$data) {
		echo '<span class="label label-danger font-weight-100">Chưa duyệt</span>';
	}else{
		$color = Category::DOC_STATUS_CLASS_COLOR[$data->id];
		echo '<span class="label label-'.$color.' font-weight-100">'.$data->name.'</span>';
	}
}





