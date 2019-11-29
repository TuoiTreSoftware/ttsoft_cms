<?php

namespace TTSoft\Promotions\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Promotions\Entities\Discount;
use TTSoft\Promotions\Http\Requests\Admin\CreateDiscountRequest;
use Carbon\Carbon;
class DiscountController extends Controller
{

    public function getList(Request $request){
    	$now = \Carbon\Carbon::now()->format('Y-m-d');
        $discounts = Discount::getPaginate(env('PAGINATE_PAGER'));
        return view('promotion::promotions.index',compact('discounts'));
    }

    public function postCreate(CreateDiscountRequest $request){
        $data = $request->all();
        $discount = new Discount;
        $discount->name = $request->input('name');
        $discount->code = $request->input('code');
        $discount->value = $request->input('value');
        $discount->type = $request->input('type');
        $discount->online = $request->input('online');
        $discount->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $discount->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
        $discount->course_id = 0;
        $discount->course_class_id = 0;
        $discount->save();
        flash_info(trans('Create Discount successfully.'));
    	return redirect()->route('admin.promotions.get.list');
    }

    public function generate(){
        return 'VKSPA'.str_random(6);
    }

    public function getDeleted($id){
        $discount = Discount::findById($id);
        $discount->delete();
        flash_info(trans('Delete Discount successfully.'));
        return redirect()->route('admin.promotions.get.list');
    }
}
