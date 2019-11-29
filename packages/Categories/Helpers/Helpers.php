<?php
use TTSoft\Base\Entities\LangContent;


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

/*function cate_parent($data,$parent = 0,$str = "",$select=0){
	foreach($data as  $val)
	{
		$id = $val->id;
		$name = $val->name;
		if($val->parent_id == $parent)
		{
			if($select != 0 && $id == $select)
			{
				echo "<option value = '$id' selected = 'selected'>$str $name</option>";
			}
			else
			{
				echo "<option value = '$id'>$str $name</option>";
			}
			cate_parent($data,$id,$str."-",$select);
		}
	}
}*/

function get_category_by_prefix($prefix, $str, $id, $selected){
	$data = \TTSoft\Categories\Entities\Category::where('prefix',$prefix)->where('parent_id',$id)->get();
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
	$data = \TTSoft\Categories\Entities\ProductCategory::getContentAll($lang)->where('parent_id',$parent)->get();
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
	$data = \TTSoft\Categories\Entities\Category::where('prefix',$prefix)->where('parent_id',$id)->get();
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
	$data = \TTSoft\Categories\Entities\Category::find($id);
	if (!$data) {
		echo '<span class="label label-danger font-weight-100">Chưa duyệt</span>';
	}else{
		$color = \TTSoft\Categories\Entities\Category::DOC_STATUS_CLASS_COLOR[$data->id];
		echo '<span class="label label-'.$color.' font-weight-100">'.$data->name.'</span>';
	}
}
//get id_category_product




