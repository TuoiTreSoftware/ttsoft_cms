<?php

namespace TTSoft\Dashboard\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Dashboard\Repositories\Eloquent\EloquentUserRepository;
use TTSoft\Dashboard\Events\EventLogin;
use TTSoft\Dashboard\Http\Resources\UserResource;
use TTSoft\Sales\Entities\BillingOrder;

class DashboardController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentUserRepository $repository){
		$this->repository = $repository;
	}

	public function index(Request $request){
        return view("dashboard::index");
	}
}
