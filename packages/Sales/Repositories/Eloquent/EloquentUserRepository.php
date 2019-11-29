<?php 

namespace TTSoft\Sales\Repositories\Eloquent;

use TTSoft\Sales\Repositories\UserRepository;

use TTSoft\Sales\Entities\User;

use TTSoft\Sales\Entities\Admin;
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