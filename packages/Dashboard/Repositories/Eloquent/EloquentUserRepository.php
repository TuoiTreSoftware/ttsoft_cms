<?php 

namespace TTSoft\Dashboard\Repositories\Eloquent;

use TTSoft\Dashboard\Repositories\UserRepository;

use TTSoft\Dashboard\Entities\User;

use TTSoft\Dashboard\Entities\Admin;
/**
* @return class name use repository
*/
class EloquentUserRepository implements UserRepository
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