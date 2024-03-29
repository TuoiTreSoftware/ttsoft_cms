<?php 

namespace TTSoft\Customers\Repositories\Eloquent;

use TTSoft\Customers\Repositories\UserRepository;

use TTSoft\Customers\Entities\Customers;

use TTSoft\Customers\Entities\Admin;
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