<?php 

namespace TTSoft\Categories\Repositories\Eloquent;

use TTSoft\Categories\Repositories\UserRepository;

use TTSoft\Categories\Entities\User;

use TTSoft\Categories\Entities\Admin;
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