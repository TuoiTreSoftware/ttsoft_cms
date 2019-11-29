<?php

namespace TTSoft\Inventories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Inventories\Repositories\Eloquent\EloquentUserRepository;
use TTSoft\Inventories\Events\EventLogin;
use TTSoft\Inventories\Http\Resources\UserResource;
use TTSoft\Inventories\Http\Requests\Admin\StatusRequest;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_details;
use TTSoft\Inventories\Entities\Voucher as Doc_headers;
use TTSoft\Customers\Entities\Customer;
use TTSoft\Categories\Entities\Category;
use Carbon\Carbon;
use TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest;
use TTSoft\Inventories\Entities\DHB; //Đơn hàng bán
use TTSoft\Inventories\Entities\DHM; //Đơn hàng mua
use TTSoft\Inventories\Entities\PNK; //Phiếu nhập kho
use TTSoft\Inventories\Entities\PXK; //Phiếu xuất kho
use TTSoft\Products\Entities\Product;
use DB;
class ExportInventoriesController extends Controller
{
    public function getListXK($prefix = "XK"){
       $data = PXK::getPaginate(env('PAGER'));
       return view("inventories::xuat_kho.list",compact('data'));
   }
   public function getCreateXK(){
    $parent = Customer::findAll();
    $warehouse = Category::where('prefix','WAREHOUSE')->get();
    return view("inventories::xuat_kho.create",compact('parent','warehouse'));
}
public function postCreateXK(DocHeaderRequest $request){
    DB::beginTransaction();
    $carbon = new Carbon();
    $carbon = Carbon::now();
    $data = new PXK;
    $data->customer_id = $request->customer_id;
    $data->description = $request->description;
    $data->operation_date = Carbon::parse($request->date_export)->format('Y-m-d');
    $data->status_id = $request->tinh_trang;
    $data->doc_code = PXK::PREFIX.$carbon->year.$carbon->month.$data->id;
    $data->user_id = auth()->user()->id;
    $data->save();
        //insert doc_details;
    $doc_details2 = new Doc_details;
    $doc_details2->kho_id = $request->kho_id;
    if($request->has('doc_details')){
        foreach ($request->input('doc_details') as $key => $value) {
            $doc_details = new Doc_details;
            $doc_details->product_id = $value["product_id"];
            $doc_details->quantity = $value["quanlity"];
            $doc_details->doc_headers_id = $data->id;
            $doc_details->price = 0;
            $doc_details->kho_id = $doc_details2->kho_id;
            $doc_details->vat = 0;
            $doc_details->save();
        }
        $data->save();
    }
    DB::commit();
    flash_info(trans('Thêm phiếu nhập kho thành công'));
    return redirect()->route('inventories.xuat_kho.get.list');
}
public function getEditXK($id){
    $data = PXK::findById($id);
    $parent = Customer::findAll();
    return view("inventories::xuat_kho.edit",compact('data','parent'));
}
public function postEditXK($id, Request $request){
    DB::beginTransaction();
    $carbon = new Carbon();
    $carbon = Carbon::now();
    $data = PXK::findById($id);
    $data->customer_id = $request->customer_id;
    $data->description = $request->description;
    $data->operation_date = Carbon::parse($request->date_export)->format('Y-m-d');
    $data->status_id = $request->tinh_trang;
    $data->user_id = auth()->user()->id;
    $data->save();
        //insert doc_details;
    $doc_details2 = new Doc_details;
    $doc_details2->kho_id = $request->kho_id;
    if($request->has('doc_details')){
        Doc_details::where('doc_headers_id',$data->getId())->delete();
        foreach ($request->input('doc_details') as $key => $value) {
            $doc_details = new Doc_details;
            $doc_details->product_id = $value["product_id"];
            $doc_details->quantity = $value["quanlity"];
            $doc_details->price = 0;
            $doc_details->vat = 0;
            $doc_details->doc_headers_id = $data->id;
            $doc_details->kho_id = $doc_details2->kho_id;
            $doc_details->save();
        }
        $data->save();
    }
    DB::commit();
    flash_info(trans('Thêm phiếu nhập kho thành công'));
    return redirect()->route('inventories.xuat_kho.get.list');

}
public function getDeleteXK($id){
    $data = Doc_headers::findById($id);
    $data->delete();
    return redirect()->route('inventories.xuat_kho.get.list');

}
public function findProduct(Request $request){
    $data = $request->all();
    $product = Product::findById($data['productId']);
    $html = view("inventories::xuat_kho.appends",compact('product'))->render();
    return response()->json(['status' => 'OK','html' => $html]);
}
}
