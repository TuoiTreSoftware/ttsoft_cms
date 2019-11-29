<?php 

namespace TTSoft\HR\Repositories\Eloquent;

use TTSoft\HR\Repositories\HRRepository;

use TTSoft\HR\Entities\HR;

use TTSoft\HR\Entities\Admin;
/**
* @return class name use repository
*/
class EloquentHRRepository implements UserRepository
{
	
	public function __construct(){}

	/**
	 *
	 * @return get all list user
	 *
	 */
	public function getAllUser(){
		return User::all();
	}

	/**
	 *
	 * @return get all list admin
	 *
	 */
	public function getAllAdmin(){
		return Admin::all();
	}
}