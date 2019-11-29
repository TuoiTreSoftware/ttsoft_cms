<?php 

namespace TTSoft\Promotions\Repositories\Eloquent;

use TTSoft\Promotions\Repositories\PromotionsRepository;

use TTSoft\Promotions\Entities\Promotions;

use TTSoft\Promotions\Entities\Admin;
/**
* @return class name use repository
*/
class EloquentPromotionsRepository implements UserRepository
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