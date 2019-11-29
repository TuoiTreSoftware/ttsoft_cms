<?php 
use TTSoft\Base\Entities\LangContent;
	if (!function_exists('get_language_post')) {
		function get_language_post($lang , $post_id){
		    $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_POST)
		        ->where('table_name',$post_id)
		        ->where('lang',$lang)
		        ->latest("created_at")
		        ->count();
		    return $content;
		}
	}


	if (!function_exists('get_language_post_category')) {
		function get_language_post_category($lang , $post_id){
		    $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_POST_CATEGORY)
		        ->where('table_name',$post_id)
		        ->where('lang',$lang)
		        ->latest("created_at")
		        ->count();
		    return $content;
		}
	}