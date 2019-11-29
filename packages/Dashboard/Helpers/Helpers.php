<?php 

	if (!function_exists('get_courses_count')) {
		function get_courses_count(){
			$data = \TTSoft\Courses\Entities\Courses::count();
			if (!$data) {
				return false;
			}
			return $data;
		}
	}

	if (!function_exists('get_contact_count')) {
		function get_contact_count(){
			$data = \TTSoft\Contact\Entities\Contact::count();
			if (!$data) {
				return false;
			}
			return $data;
		}
	}

	if (!function_exists('get_student_count')) {
		function get_student_count(){
			$data = \TTSoft\Courses\Entities\InfoStudent::count();
			if (!$data) {
				return false;
			}
			return $data;
		}
	}

	if (!function_exists('get_class_active_count')) {
		function get_class_active_count($status = 1){
			$data = \TTSoft\Courses\Entities\ClassRoom::where('status',$status)->count();
			if (!$data) {
				return false;
			}
			return $data;
		}
	}