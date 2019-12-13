<?php 
use TTSoft\Dashboard\Entities\Contact;

if (!function_exists('get_contact_count')) {
	function get_contact_count(){
		$data = Contact::count();
		if (!$data) {
			return false;
		}
		return $data;
	}
}