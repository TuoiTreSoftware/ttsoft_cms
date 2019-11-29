<?php

namespace TTSoft\HR\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TTSoft\HR\Entities\Staffs as Staff;
use TTSoft\HR\Entities\StaffsInOut;
use App\Http\Controllers\Controller;
use TTSoft\Customers\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StaffsInOutController extends Controller
{

    public function getList(Request $request){
        $staff = Staff::findAll();
        return view("HR::staffs_in_out.list",compact('staff'));
    }
	public function postChamCongVao(Request $request){
        $in_out = $request->all();
        $data = new StaffsInOut($in_out);
        $data->save();
		return redirect()->route("staffs_in_out.get.list");
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
