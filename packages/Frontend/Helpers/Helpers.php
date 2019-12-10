<?php 
use  TTSoft\Products\Entities\Product;
use  TTSoft\Post\Entities\Post;
use  TTSoft\Menu\Entities\MenuCategory;
use TTSoft\Categories\Entities\ProductCategory;
if (!function_exists('get_slider')) {
	function get_slider($category = 'home', $sort = 'DESC', $limit = 5){
		$data = \TTSoft\Slider\Entities\Slider::orderBy('id',$sort)->where('category',$category)->limit($limit)->get();
		if (!$data) {
			return false;
		}
		return $data;
	}
}

if (!function_exists('get_section_home')) {
	function get_section_home($key){
		$data = \TTSoft\Home\Entities\Home::getFirstKey($key);
		return $data;
	}
}

if (!function_exists('get_product_home')) {
	function get_product_home($sort = 'DESC', $limit = 10, $Category_id = 2){
		$data = \TTSoft\Products\Entities\Product::where('product_category_id',$Category_id)->orderBy('id',$sort)->limit($limit)->get();
		if (!$data) {
			return false;
		}
		return $data;
	}
}

if (!function_exists('get_post_home')) {
	function get_post_home($limit = 4 , $category = \TTSoft\Post\Entities\Post::TIN_NOI_BAT){
		$category = \TTSoft\Post\Entities\Category::find($category);
		if (!$category) {
			return false;
		}
		return $category->posts()->limit($limit)->get();
	}
}

if (!function_exists('get_related_post')) {
	function get_related_post($category, $id, $limit = 4){
		$post = \TTSoft\Post\Entities\Post::where(['status' => 1,'category_id' => $category])
		->where('id', '<>', $id)
		->orderBy('id','DESC')
		->limit($limit)
		->get();
		if (!$post) {
			return false;
		}
		return $post;
	}
}

if (!function_exists('get_media_home')) {
	function get_media_home($category, $limit = 16, $sort = 'DESC'){
		$home = \TTSoft\Media\Entities\Media::where(['status' => 1,'category' => $category])
		->orderBy('id',$sort)
		->limit($limit)
		->get();
		if (!$home) {
			return false;
		}
		return $home;
	}
}

if(!function_exists('get_post')){
	function get_post($limit = 12, $sort = "DESC",$category = \TTSoft\Post\Entities\Post::TIN_TUC_ID){
		$data = \TTSoft\Post\Entities\Post::orderBy('id',$sort)->where(['status' => 1])->paginate($limit);
		if (!$data) {
			return false;
		}
		return $data;
	}
}

if(!function_exists('get_featured_post')){
	function get_featured_post($limit = 7, $sort = "DESC",$category = \TTSoft\Post\Entities\Post::TIN_NOI_BAT){
		$category = \TTSoft\Post\Entities\Category::find($category);
		if (!$category) {
			return false;
		}
		return $category->posts()->orderBy('id',$sort)->limit($limit)->get();
	}
}
// get menu
if (!function_exists('get_menu_nav')) {
	function get_menu_nav($identify , $parent = 0){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$category = MenuCategory::where('identify',$identify)->first();
		if (!$category) {
			return [];
		}
		$data = \TTSoft\Menu\Entities\Menu::where(['parent_id' => $parent, 'category' => $category->id,'lang' => $lang])
		->orderBy('position','ASC')
		->get();
		if (count($data) > 0) {
			return $data;
		}
		return [];
	}
}

if (!function_exists('get_provinces')) {
	function get_provinces(){
		$data = DB::table('provinces')->orderBy('name','DESC')->get();
		if (count($data) > 0) {
			return $data;
		}
		return false;
	}
}

	// lấy giá trị trong table config $key = field:slug
if (!function_exists('web_config')) {
	function web_config($key){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$data = \TTSoft\Setting\Entities\Setting::where('key',$key)
		->where('lang',$lang)
		->first();
		if ($data) {
			return $data->value;
		}
		return null;
	}
}


if (!function_exists('anothor_courses')) {
	function anothor_courses($id = null){
		$data = \TTSoft\Courses\Entities\Courses::where('id','<>',$id)->get();
		if ($data) {
			return $data;
		}
		return null;
	}
}

if (!function_exists('get_key_home')) {
	function get_key_home($key){
		$data = \TTSoft\Home\Entities\Home::getFirstKey($key);
		if ($data) {
			return $data;
		}
		return null;
	}
}
if (!function_exists('get_key_home_frontend')) {
	function get_key_home_frontend($key){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		// $data = \TTSoft\Home\Entities\Home::getFirstKey($key);
		$home = \TTSoft\Home\Entities\Home::getContentAll($lang)->where(['slug' => $key])->first();
		// dd($home);
		if ($home) {
			return $home;
		}
		return null;
	}
}

if (!function_exists('get_of_hct')) {
	function get_of_hct($value){
		$data = \TTSoft\About\Entities\About::getFirstKey('about');
		if ($data) {
			return $data->$value;
		}
		return null;
	}
}

/*Tham số dự toán*/

if(!function_exists('getThamSoDuToan')){
	function getThamSoDuToan($id){
		$data = TTSoft\Products\Entities\TSDT::where('type',$id)->get();
		return $data;
	}
}

if(!function_exists('getHeSoTinhToan')){
	function getHeSoTinhToan($id){
		$data = TTSoft\Products\Entities\TSDT::findById($id);
		return $data->value;
	}
}

if(!function_exists('mucDoDauTu')){
	function mucDoDauTu($dienTichTinhToan, $id = 5){
		$mucDoDauTu = TTSoft\Products\Entities\TSDT::where('type',$id)->orderBy('value','ASC')->get();
		foreach ($mucDoDauTu as $key => $val) {
			$heSoMucDoDauTu = $val->getTitleToNumber();
			if($heSoMucDoDauTu > $dienTichTinhToan) continue;
			return $data = $val->value;
		}
	}
}

//REDSUN
if (!function_exists('get_product_highlights')) {
	function get_product_highlights(){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$products = Product::getContentAll($lang)->limit(10)->get();
		return $products;
	}
}

//REDSUN
if (!function_exists('get_all_product_categories')) {
	function get_all_product_categories(){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$categories = ProductCategory::getContentAll($lang)->limit(10)->get();
		return $categories;
	}
}

if (!function_exists('get_lang_all_products')) {
	function get_lang_all_products($category_id , $limit){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$products = Product::getContentAll($lang)
		->where('product_category_id',$category_id)
		->where('status',1)
		->limit($limit)
		->get();
		return $products;
	}
}

if (!function_exists('is_category_home')) {
	function is_category_home(){
		$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
		$categories = ProductCategory::getContentAll($lang)->limit(10)->get();
		return $categories;
	}
}
function getaddress(){
	$address = TTSoft\Setting\Entities\Branch::get();
	return $address;
}

function getGroupAttribut(){
	$group = TTSoft\Products\Entities\Attribute::get();
	return $group;
}

function getPrice(){
	$data = TTSoft\Products\Entities\Product::orderBy('price_sale','DESC')->first();
	return $data;
}


function getCategoryPost($alias){
	
	$data = TTSoft\Post\Entities\Category::where('slug',$alias)->first();
	return $data->name;
}

function getTitleposts($slug){
	$data = TTSoft\Post\Entities\Post::where('slug',$slug)->first();
	return $data;
}

function getCategoryLang($id){
	$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
	$data = ProductCategory::getContentAll($lang)->find($id);
	return $data->getTitle();
}

function getTinhTrang($id){
	$data = TTSoft\Sales\Entities\BillingOrderDetail::where('doc_headers_id',$id)->get();
	if(count($data) > 0){
		return 'đã thanh toán';
	}else
	{
		return 0;

	}
}