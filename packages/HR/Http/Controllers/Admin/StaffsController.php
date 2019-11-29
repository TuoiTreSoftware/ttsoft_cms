<?php

namespace TTSoft\HR\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TTSoft\HR\Entities\Staffs;
use App\Http\Controllers\Controller;
use TTSoft\Customers\Repositories\Eloquent\EloquentUserRepository;
class StaffsController extends Controller
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
    	$customer = Staffs::paginate($page);
    		return view("HR::staffs.list",compact("customer"))
   			->with('i', ($request->input('page', 1) - 1) * $page);
    }

    public function getCreate(){
    		return view("HR::staffs.create");
    }

	public function postCreate(Request $request){
		$customer = $request->all();
		$customerInsert = new Staffs($customer);
		$customerInsert -> save();
			return redirect()->route('staffs.get.list');
    }    

    public function getEdit($id){
    	$customer = Staffs::findById($id);
    		return view("HR::staffs.edit",compact('customer'));
    }
	public function postEdit($id){
		$customer = Staffs::findById($id);
		$customer->update(request()->all());
        flash_success(trans('Update Category Successful'));
			return redirect()->route("staffs.get.edit",$id);
	}

	public function getDetail($id){
    	$customer = Staffs::findById($id);
    		return view("HR::staffs.detail",compact('customer'));
    }

	public function getDelete($id){
        $del = Staffs::findById($id);
        if(file_exists("/uploads/images/customers/".$del->avatar)){
                unlink("/uploads/images/customers/".$del->avatar);}
        $del->delete();
        return redirect()->route('staffs.get.list');
    }
}
