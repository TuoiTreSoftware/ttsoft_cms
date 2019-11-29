<?php 
	if (!function_exists('get_config')) {
		function get_config($key){
			$ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
			$data = \TTSoft\Setting\Entities\Setting::where('key',$key)
				->where('lang',$ref_lang)
				->first();
			if ($data) {
				return $data->value;
			}
			return null;
		}
	}

	if (!function_exists('get_branch_name')) {
		function get_branch_name($key){
			$data = \TTSoft\Setting\Entities\Branch::where('id',$key)->first();
			if ($data) {
				return $data->name;
			}
			return null;
		}
	}

	if (!function_exists('get_province')) {
		function get_province($key){
			$data = DB::table('provinces')->where('id',$key)->first();
			if ($data) {
				return $data->name;
			}
			return null;
		}
	}

	if(!function_exists('get_province_group_by')){
		function get_province_group_by(){
			$data = \TTSoft\Setting\Entities\Branch::orderBy('id','DESC')
					->select('provinces_id')
					->groupBy('provinces_id')
					->get();

			return $data;
		}
	}

	