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
use TTSoft\Products\Entities\Product;
use TTSoft\Categories\Entities\Category;
use Carbon\Carbon;
use TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest;
use TTSoft\Inventories\Entities\DHB; //Đơn hàng bán
use TTSoft\Inventories\Entities\DHM; //Đơn hàng mua
use TTSoft\Inventories\Entities\PNK; //Phiếu nhập kho
use TTSoft\Inventories\Entities\PXK; //Phiếu xuất kho

use DB;
class ImportinventoriesController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

    //nhap kho
    public function getList(){
        $data = PNK::getPaginate(env('PAGER'));
        // $vattu = Category::VATTU;
        // $hanghoa = Category::HANGHOA;
        // $products = Product::whereIn('type_id',[$vattu,$hanghoa]);
        // $products = $products->where('sku','like',1)->get();
        // dd($products);
        return view("inventories::nhap_kho.list",compact('data'));
    }
    public function getCreate(){
        $parent = Customer::findAll();
        $warehouse = Category::where('prefix','WAREHOUSE')->get();
        return view("inventories::nhap_kho.create",compact('parent','warehouse'));
    }
    public function postCreate(Request $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $carbon = Carbon::now();
        $data = new PNK;
        $data->customer_id = $request->customer_id;
        $data->description = $request->description;
        $data->operation_date = Carbon::parse($request->date_export)->format('Y-m-d');
        $data->status_id = $request->tinh_trang;
        $data->user_id = auth()->user()->id;
        $data->doc_code = PNK::PREFIX.$carbon->year.$carbon->month.$data->id;
        $data->save();

        //insert doc_details;
        $doc_details2 = new Doc_details;
        $doc_details2->kho_id = $request->kho_id;
        if($request->has('doc_details')){
            foreach ($request->input('doc_details') as $key => $value) {
                $doc_details = new Doc_details;
                $doc_details->product_id = $value["product_id"];
                $doc_details->quantity = $value["quantity"];
                $doc_details->gia_tri = $value["gia_tri"];
                $doc_details->gia_tri_vat = $value["gia_tri_vat"];
                $doc_details->price = $value['price'];
                $doc_details->vat = $value["vat"];
                $doc_details->doc_headers_id = $data->id;
                $doc_details->kho_id = $doc_details2->kho_id;
                $doc_details->save();
            }
            $data->save();
        }
        DB::commit();
        flash_info(trans('Thêm phiếu nhập kho thành công'));
        return redirect()->route('inventories.nhap_kho.get.list');
    }
    public function getEdit($id){
        $data = PNK::findById($id);
        $parent = Customer::findAll();
        $product = Product::where('id',$data->product_id)->get();
        return view("inventories::nhap_kho.edit",compact('data','parent','product'));
    }
    public function postEdit($id, DocHeaderRequest $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $carbon = Carbon::now();
        $data = PNK::findById($id);
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
                $doc_details->quantity = $value["quantity"];
                $doc_details->gia_tri = $value["gia_tri"];
                $doc_details->gia_tri_vat = $value["gia_tri_vat"];
                $doc_details->price = $value['price'];
                $doc_details->vat = $value["vat"];
                $doc_details->doc_headers_id = $data->id;
                $doc_details->kho_id = $doc_details2->kho_id;
                $doc_details->save();
            }
            $data->save();
        }
        DB::commit();
        flash_info(trans('Thêm phiếu nhập kho thành công'));
        return redirect()->route('inventories.nhap_kho.get.list');

    }
    public function getDelete($id){
        $data = PNK::findById($id);
        $data->delete();
        return redirect()->route('inventories.nhap_kho.get.list');
    }

    public function findProduct(Request $request){
        $data = $request->all();
        $vatu = Category::VATTU;
        $hanghoa = Category::HANGHOA;
        $product = Product::findById($data['productId']);
        $html = view("inventories::nhap_kho.appends",compact('product'))->render();
        return response()->json(['status' => 'OK','html' => $html]);
    }
    public function autocomplete(Request $request)
    {
        $data = $request->all();
        $vattu = Category::VATTU;
        $hanghoa = Category::HANGHOA;
        // return response()->json($data) query;
        $products = Product::where(function($q) use ($data){
            $q->whereIn('type_id',15,16)
            ->where('title','like','%'.$key.'%')
            ->orWhere('sku','like','%'.$key.'%')
            ->orWhere('product_barcode','like','%'.$key.'%');
        });
        if (!empty($request->array)) {
            $products = $products->whereNotIn('id',$request->array);
        }
        $products = $products->orderBy('title','ASC')
            ->limit(5)
            ->get();
        if ($products != null) {
            $results = '';
            foreach ($products as $key => $value) {
                $price = $value->getPriceCurrently();
                $results.='<li>
                    <img src="'.$value->getImage().'" alt='.$value->getTitle().'""/>
                    <a class="append-record" href="javascript:void(0)" data-id="'.$value->getId().'">'.$value->getTitle().' <br /><span> SKU: '.$value->getSku().'</span><span> - Barcode: '.$value->getBarcode().'</span><span> - Giá: '.format_price($price).'</span></a>
                </li>';
            }
            return response()->json(['status' => 'OK','html' => $results]);
        }
        return response()->json(['status' => 'ERROR']);
    }
}
