<?php 
use Szykra\Notifications\Flash;

if (!function_exists('format_price')) {
	function format_price($price , $symbol = ''){
		return number_format($price,0,',','.');
	}
}

if (!function_exists('format')) {
	function format($price , $symbol = ''){
		return number_format($price,0,',','.');
	}
}

if (!function_exists('flash_info')) {
	function flash_info($msg = ''){
		Flash::info($msg);
	}
}

if (!function_exists('flash_error')) {
	function flash_error($msg = ''){
		Flash::error($msg);
	}
}

if (!function_exists('flash_success')) {
	function flash_success($msg = ''){
		Flash::success($msg);
	}
}

if (!function_exists('flash_warning')) {
	function flash_warning($msg = ''){
		Flash::warning($msg);
	}
}

if (!function_exists('get_directories')) {
	function get_directories($path){
		$directories = [];
		$items = scandir($path);
		foreach ($items as $item) {
			if($item == '..' || $item == '.')
				continue;
			if(is_dir($path.'/'.$item))
				$directories[] = $item;
		}
		return $directories;
	}
}

if (!function_exists('folder_views')) {
	function folder_views(){
		$folder = get_directories(base_path('packages'));
		$folderViews = [];
		foreach ($folder as $key => $value) {
			if ($value != 'Base') {
				$folderViews[] = "TTSoft\\".$value."\\Providers\\".BaseServiceProvider::class;
			}
		}
		return $folderViews;
	}
}
/**
 *
 * merge all config menu in module
 *
 */

if (!function_exists('config_menu_merge')) {
	function config_menu_merge(){
		$menu = get_directories(base_path('packages'));
		$activeMenu = [];
		foreach ($menu as $key => $value) {
			$urlPath = $value.'/Config/menu.php';
			if (file_exists(base_path('packages') . '/' . $urlPath)) {
				$activeMenu[] = require(base_path('packages') . '/' . $urlPath);
			}
		}
		$activeMenu = collect($activeMenu)->sortBy('sort')->toArray();
		return $activeMenu;
	}
}

/**
 *
 * merge all config permission in module
 *
 */
if (!function_exists('config_permission_merge')) {
	function config_permission_merge(){
		$menu = get_directories(base_path('packages'));
		$activeMenu = [];
		foreach ($menu as $key => $value) {
			$urlPath = $value.'/Config/permission.php';
			if (file_exists(base_path('packages') . '/' . $urlPath)) {
				$activeMenu[] = require(base_path('packages') . '/' . $urlPath);
			}
		}

		return $activeMenu;
	}


	if (!function_exists('__trans')) {
		function __trans($value){
			$ltm_translations = DB::table('ltm_translations')->where('key',$value)->where('locale',config('app.locale'))->first();
			if ($ltm_translations && !empty($ltm_translations->value) ) {
				return $ltm_translations->value;
			}
			return trans($value);
		}
	}


	if (!function_exists('lt_language')) {
		function lt_language(){
			return (session()->has('locale')) ? session()->get('locale') : config('app.locale');
		}
	}
}
if(!function_exists('richObjects')) {
	function richObjects($lang, $type, $title, $description, $url, $site_name, $image, $secure_url, $index, $follow){
		echo '<meta property="og:locale" content="'.$lang.'" />
		<meta property="og:type" content="'.$type.'" />
		<meta name="og:title" property="og:title" content="'.$title.'" />
		<meta property="og:description" content="'.$description.'" />
		<meta property="og:url" content="'.$url.'" />
		<meta property="og:site_name" content="'.$site_name.'" />
		<meta property="og:image" content="'.$image.'" />
		<meta property="og:image:secure_url" content="'.$secure_url.'" />
		<title>'.$title.'</title>
		<meta name="description" content="'.$description.'">
		<meta name="robots" content="'.$index.', '.$follow.'">';
	}
}