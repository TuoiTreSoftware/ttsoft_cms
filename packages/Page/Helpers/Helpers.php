<?php 
use TTSoft\Base\Entities\LangContent;
	if (!function_exists('get_language_page')) {
		function get_language_page($lang , $post_id){
		    $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_PAGE)
		        ->where('table_name',$post_id)
		        ->where('lang',$lang)
		        ->latest("created_at")
		        ->count();
		    return $content;
		}
	}