<?php

namespace TTSoft\HR\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TTSoft\HR\Entities\StaffsCommission;
use TTSoft\HR\Entities\Staffs;
use App\Http\Controllers\Controller;
use TTSoft\Customers\Repositories\Eloquent\EloquentUserRepository;
use TTSoft\HR\Entities\Hoa_Hong_San_Pham;
use TTSoft\Products\Entities\ProductCate;
use DB;

class CommissionController extends Controller
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
        $cate = ProductCate::all();
        if($request->has('staff-select')){
            $staff_id = $request['staff-select'];
            $staff = Staffs::findById($staff_id);
            return view("HR::commission.create", compact('staff','cate'));
        }
        return view("HR::commission.create");
    }

    public function postCreate(Request $request){
        $data = $request->all();
        if ($request->has('hoahong')) {
            Hoa_Hong_San_Pham::where('staffs_id',$data['staffs_id'])->delete();
            foreach ($data['hoahong'] as $key => $value){
                $data = new Hoa_Hong_San_Pham;
                $data->product_cate_id = $value['product_cate_id'];
                $data->staffs_id = $request->staffs_id;
                $data->tyle_hoahong = $value['tyle_hoahong'];
                $data->tien_tua = $value['tien_tua'];
                $data->save();
            }
        }
        return redirect()->route('commission.get.list');
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
