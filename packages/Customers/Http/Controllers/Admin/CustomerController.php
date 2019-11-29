<?php

namespace TTSoft\Customers\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TTSoft\Customers\Entities\Customer;
use App\Http\Controllers\Controller;
use TTSoft\Customers\Repositories\Eloquent\EloquentUserRepository;

class CustomerController extends Controller
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


    public function getList(Request $request){
    	$page = 6;
    	$customer = Customer::paginate($page);
    		return view("Customers::customer.list",compact("customer"))
   			->with('i', ($request->input('page', 1) - 1) * $page);
    }

    public function getCreate(){
    		return view("Customers::customer.create");
    }

	public function postCreate(Request $request){
		$customer = $request->all();
		$customerInsert = new Customer($customer);
		$customerInsert -> save();
			return redirect()->route('customer.get.list');
    }    

    public function getEdit($id){
    	$customer = Customer::findById($id);
    		return view("Customers::customer.edit",compact('customer'));
    }
	public function postEdit($id){
		$customer = Customer::findById($id);
		$customer->update(request()->all());
        flash_success(trans('Update Category Successful'));
			return redirect()->route("customer.get.edit",$id);
	}

	public function getDetail($id){
    	$customer = Customer::findById($id);
    		return view("Customers::customer.detail",compact('customer'));
    }

	public function getDelete($id){
        $del = Customer::findById($id);
        if(file_exists("/uploads/images/customers/".$del->avatar)){
                unlink("/uploads/images/customers/".$del->avatar);}
        $del->delete();
        return redirect()->route('customer.get.list');
    }
}
