<?php

namespace TTSoft\Accounting\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_details;
use TTSoft\Inventories\Entities\Voucher as Doc_headers;
use TTSoft\Categories\Entities\Category;
use Carbon\Carbon;
use TTSoft\Inventories\Entities\BNNH;
use TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest;
use TTSoft\Customers\Entities\Customer;
use DB;
class BaoNoController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(){
		
	}


    public function index(Request $request){
        
    }

    public function getList(){
    	$data = BNNH::findAll();
        return view("accounting::bao_no_ngan_hang.list",compact('data'));
    }

    public function getCreate(){
    	$data = Customer::findAll();
    	return view("accounting::bao_no_ngan_hang.create",compact('data'));
    }
    public function postCreate(Request $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $carbon = Carbon::now();
        $data = new BNNH;
        $data->customer_id = $request->customer_id;
        $data->description = $request->description;
        $data->operation_date = Carbon::parse($request->date_export)->format('Y-m-d');
        $data->status_id = $request->tinh_trang;
        $data->bank_accounts = $request->bank_accounts;
        $data->user_id = auth()->user()->id;
        $data->doc_code = BNNH::PREFIX.$carbon->year.$carbon->month.$data->id;
        $data->save();
        //insert doc_details;
        $doc_details2 = new Doc_details;
        if($request->has('doc_details')){
            foreach ($request->input('doc_details') as $key => $value) {
                $doc_details = new Doc_details;
                $doc_details->price = 0;
                $doc_details->vat = 0;
                $doc_details->gia_tri = $value["gia_tri"];
                $doc_details->quantity = 0;
                $doc_details->product_id = 0;
                $doc_details->kho_id = 0;
                $doc_details->product_billing_id = $value["product_billing_id"];
                $doc_details->gia_tri_vat = $value["gia_tri_vat"];
                $doc_details->khoang_muc_phi = $value["khoang_muc_phi"];
                $doc_details->doc_headers_id = $data->id;
                $doc_details->save();
            }
            $data->save();
        }
        DB::commit();
        flash_info(trans('Thêm phiếu nhập kho thành công'));
        return redirect()->route('accounting.bao_no.get.list');
    }
    public function getEdit($id){
        $data = BNNH::findById($id);
        $parent = Customer::findAll();
        return view("accounting::bao_no_ngan_hang.edit",compact('data','parent'));
    }
    public function postEdit($id,Request $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $carbon = Carbon::now();
        $data = BNNH::findById($id);
        $data->customer_id = $request->customer_id;
        $data->description = $request->description;
        $data->operation_date = Carbon::parse($request->date_export)->format('Y-m-d');
        $data->status_id = $request->tinh_trang;
        $data->bank_accounts = $request->bank_accounts;
        $data->user_id = auth()->user()->id;
        $data->save();
        //insert doc_details;
        $doc_details2 = new Doc_details;
        if($request->has('doc_details')){
            Doc_details::where('doc_headers_id',$data->getId())->delete();
            foreach ($request->input('doc_details') as $key => $value) {
                $doc_details = new Doc_details;
                $doc_details->price = 0;
                $doc_details->vat = 0;
                $doc_details->gia_tri = $value["gia_tri"];
                $doc_details->quantity = 0;
                $doc_details->product_id = 0;
                $doc_details->kho_id = 0;
                $doc_details->product_billing_id = $value["product_billing_id"];
                $doc_details->gia_tri_vat = $value["gia_tri_vat"];
                $doc_details->khoang_muc_phi = $value["khoang_muc_phi"];
                $doc_details->doc_headers_id = $data->id;
                $doc_details->save();
            }
            $data->save();
        }
        DB::commit();
        flash_info(trans('Thêm phiếu nhập kho thành công'));
        return redirect()->route('accounting.bao_no.get.list');
    }
    public function getDelete($id){
        $data = BNNH::findById($id);
        $data->delete();
        return redirect()->route('accounting.bao_no.get.list');

    }
}
