<?php

namespace TTSoft\Inventories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_details;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_headers;
use TTSoft\Customers\Entities\Customer;
use TTSoft\Categories\Entities\Category;
use Carbon\Carbon;
use TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest;
class TransferController extends Controller
{

    public function getList(Request $request){
        $data = Doc_headers::findAll();
        return view("inventories::phieu_dieu_chuyen.list",compact('data'));
    }
    public function getCreate(){
        $parent = Customer::findAll();
        $warehouse = Category::where('prefix','WAREHOUSE')->get();
        return view("inventories::phieu_dieu_chuyen.create",compact('parent','warehouse'));
    }
    public function postCreate(Request $request){
        // insert NK
        $carbon = new Carbon();
        $carbon = Carbon::now();
        $data = new Doc_headers;
        $data->customer_id = $request->customer_id;

        $data->description = $request->description;
        $data->operation_date = $request->operation_date;
        $data->status_id = $request->tinh_trang;
        $data->prefix = "NK";
        $data->save();
        $data->doc_code = "NX".$carbon->year.$carbon->month.$data->id;
        $data->user_id = 1;

        $data->save();
        //insert doc_details;
        $doc_details2 = new Doc_details;
        $doc_details2->kho_id = $request->kho_nhap;
        if($request->has('doc_details')){
            foreach ($request->input('doc_details') as $key => $value) {
                $doc_details = new Doc_details;
                $doc_details->product_id = $value["product_id"];
                $doc_details->quantity = $value["so_luong"];
                $doc_details->price = $value["don_gia"];
                $doc_details->vat = $value["vat"];
                $doc_details->doc_headers_id = $data->id;
                $doc_details->kho_id = $doc_details2->kho_id;
                $doc_details->save();
            }
            $data->save();
        }
        // insert XK
        $dataXK = new Doc_headers;
        $dataXK->customer_id = $request->customer_id;
        $dataXK->description = $request->description;
        $dataXK->operation_date = $request->date_export;
        $dataXK->status_id = $request->tinh_trang;
        $dataXK->prefix = "XK";
        $dataXK->save();
        $dataXK->doc_code = "NX".$carbon->year.$carbon->month.$dataXK->id;
        $dataXK->user_id = 1;
        $dataXK->save();
        //insert doc_details;
        $doc_details2XK = new Doc_details;
        $doc_details2XK->kho_id = $request->kho_xuat;
        if($request->has('doc_details')){
            foreach ($request->input('doc_details') as $key => $value) {
                $doc_detailsXK = new Doc_details;
                $doc_detailsXK->product_id = $value["product_id"];
                $doc_detailsXK->quantity = $value["so_luong"];
                $doc_detailsXK->doc_headers_id = $dataXK->id;
                $doc_detailsXK->kho_id = $doc_details2XK->kho_id;
                $doc_detailsXK->save();
            }
            $dataXK->save();
        }
        return redirect()->route('inventories.dieu_chuyen.get.list');
    }

    
}
