<?php

namespace TTSoft\Sales\Http\Controllers\Admin;

use DB;
use Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TTSoft\HR\Entities\Staffs;
use TTSoft\Sales\Entities\PBDS;
use App\Http\Controllers\Controller;
use TTSoft\Products\Entities\Product;
use TTSoft\Sales\Entities\BillingOrder;
use TTSoft\File\Http\Controllers\Export;
use TTSoft\AlepayPayment\Services\Alepay;
use TTSoft\Sales\Entities\BillingOrderDetail;

class OrderController extends Controller
{
    //DON HANG BAN DANH SACH
    public function getListOrder(Request $request){
        $billings = BillingOrder::getPaginate(10);
        return view("sales::don_hang_ban.list",compact('billings'));
    }

    //ĐON HANG BAN TAO 
    public function getCreateOrder(Request $request){
    	return view("sales::don_hang_ban.create");
    }

    //LUU DON HANG
    public function postCreateOrder(Request $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $billing = new BillingOrder;
        $billing->customer_id = $request->customer_id;
        $billing->address = $request->address;
        $billing->note = $request->note;
        $billing->doc_code = BillingOrder::PREFIX.$carbon->year.$carbon->month;
        $billing->user_id = auth()->user()->id;
        $billing->description = 'Đơn hàng : '.BillingOrder::PREFIX.$carbon->year.$carbon->month;
        $billing->save();
        $billing->doc_code = $billing->doc_code.$billing->id;
        $billing->save();
        if (!empty($request->product)) {
            foreach ($request->product as $key => $value) {
                $product = Product::findById($key);
                $doc_details = new BillingOrderDetail;
                $doc_details->product_id = $product->getId();
                $doc_details->quantity = $value['quanlity'];
                /*ĐƠN GIÁ TRÊN 1 ĐƠN VỊ SẢN PHẨM*/
                $doc_details->price = $product->getPriceCurrently();
                /*TỔNG GIÁ TRỊ CHƯA BAO GỒM VAT*/
                $doc_details->gia_tri = $product->getPriceCurrently() * $value['quanlity'];
                /*TỔNG GIÁ TRỊ VAT*/
                $doc_details->gia_tri_vat = (($product->getPriceCurrently() * $value['vat']) / 100) * $value['quanlity'];
                $doc_details->vat = $value['vat'];
                $doc_details->kho_id = 1;
                $doc_details->doc_headers_id = $billing->getId();
                $doc_details->save();
                $docDetailID = $doc_details->id;
                if (!empty($value['ty_le_tu_van'])) {
                    foreach ($value['ty_le_tu_van'] as $ktv => $tuvan) {
                        $PBDS = new PBDS;
                        $PBDS->doc_detail_id = $doc_details->id;
                        $PBDS->staff_id = $ktv;
                        $PBDS->tyle_hoahong = $tuvan;
                        $PBDS->type = PBDS::DOANH_SO_TU_VAN;
                        $PBDS->product_cate_id = !empty($product->category) ? $product->category->id : 0;
                        $PBDS->save();
                    }
                }

                if (!empty($value['ty_le_tua'])) {
                    foreach ($value['ty_le_tua'] as $ktua => $tua) {
                        $PBDS = new PBDS;
                        $PBDS->doc_detail_id = $doc_details->id;
                        $PBDS->staff_id = $ktua;
                        $PBDS->tyle_hoahong = $tua;
                        $PBDS->type = PBDS::DOANH_SO_TUA;
                        $PBDS->product_cate_id = !empty($product->category) ? $product->category->id : 0;
                        $PBDS->save();
                    }
                }
            }
        }
        DB::commit();
        flash_info(trans('Tạo đơn hàng thành công'));
        return redirect()->route('sales.don_hang_ban.get.list');
    }

    public function autocomplete(Request $request)
    {
        $data = $request->all();
        // return response()->json($data) query;
        $products = Product::findByKeywords($data['query']);
        if (!empty($request->array)) {
            $products = $products->whereNotIn('id',$request->array);
        }
        $products = $products->latest()->limit(5)->get();
        if ($products != null) {
            $results = '';
            foreach ($products as $key => $value) {
                $price = $value->getPriceCurrently();
                $results.='<li>
                    <img src="'.$value->getImage().'" alt='.$value->getTitle().'""/>
                    <a class="append-record" href="javascript:void(0)" data-id="'.$value->getId().'">'.$value->getTitle().' <br /><span> SKU: '.$value->getSku().'</span><span> - Barcode: '.$value->getBarcode().'</span><span> - Giá: '.format_price($price).'đ</span></a>
                </li>';
            }
            return response()->json(['status' => 'OK','html' => $results]);
        }
        return response()->json(['status' => 'ERROR']);
    }

    public function findProduct(Request $request){
        $data = $request->all();
        $product = Product::findById($data['productId']);
        $html = view("sales::don_hang_ban.appends",compact('product'))->render();
        return response()->json(['status' => 'OK','html' => $html]);
    }

    //ĐON HANG BAN TAO 
    public function getEditOrder($id , Request $request){
        $billing = BillingOrder::findById($id);
        $payment = $billing->getPaymentInfo();
        return view("sales::don_hang_ban.edit",compact('billing', 'payment'));
    }

    //LUU DON HANG
    public function postEditOrder($id , Request $request){
        DB::beginTransaction();
        $carbon = new Carbon();
        $billing = BillingOrder::findById($id);
        // $billing->customer_id = $request->customer_id;
        // $billing->address = $request->address;
        // $billing->note = $request->note;
        $billing->date_delivery = $request->date_delivery;
        // $billing->description = 'Đơn hàng : '.BillingOrder::PREFIX.$carbon->year.$carbon->month;
        $billing->save();
        // $billing->doc_code = $billing->doc_code.$billing->id;
        // $billing->save();
        // if (!empty($request->product)) {
        //     BillingOrderDetail::where('doc_headers_id',$billing->id)->delete();
        //     foreach ($request->product as $key => $value) {
        //         $product = Product::findById($key);
        //         $doc_details = new BillingOrderDetail;
        //         $doc_details->product_id = $product->getId();
        //         $doc_details->quantity = $value['quanlity'];
        //         /*ĐƠN GIÁ TRÊN 1 ĐƠN VỊ SẢN PHẨM*/
        //         $doc_details->price = $product->getPriceCurrently();
        //         /*TỔNG GIÁ TRỊ CHƯA BAO GỒM VAT*/
        //         $doc_details->gia_tri = $product->getPriceCurrently() * $value['quanlity'];
        //         /*TỔNG GIÁ TRỊ VAT*/
        //         $doc_details->gia_tri_vat = (($product->getPriceCurrently() * $value['vat']) / 100) * $value['quanlity'];
        //         $doc_details->vat = $value['vat'];
        //         $doc_details->kho_id = 1;
        //         $doc_details->doc_headers_id = $billing->getId();
        //         $doc_details->save();
        //         $docDetailID = $doc_details->id;
        //         if (!empty($value['ty_le_tu_van'])) {
        //             PBDS::where(['type' => PBDS::DOANH_SO_TU_VAN , 'doc_detail_id' => $docDetailID])->delete();
        //             foreach ($value['ty_le_tu_van'] as $ktv => $tuvan) {
        //                 $PBDS = new PBDS;
        //                 $PBDS->doc_detail_id = $doc_details->id;
        //                 $PBDS->staff_id = $ktv;
        //                 $PBDS->tyle_hoahong = $tuvan;
        //                 $PBDS->type = PBDS::DOANH_SO_TU_VAN;
        //                 $PBDS->product_cate_id = !empty($product->category) ? $product->category->id : 0;
        //                 $PBDS->save();
        //             }
        //         }

        //         if (!empty($value['ty_le_tua'])) {
        //             PBDS::where(['type' => PBDS::DOANH_SO_TUA , 'doc_detail_id' => $docDetailID])->delete();
        //             foreach ($value['ty_le_tua'] as $ktua => $tua) {
        //                 $PBDS = new PBDS;
        //                 $PBDS->doc_detail_id = $doc_details->id;
        //                 $PBDS->staff_id = $ktua;
        //                 $PBDS->tyle_hoahong = $tua;
        //                 $PBDS->type = PBDS::DOANH_SO_TUA;
        //                 $PBDS->product_cate_id = !empty($product->category) ? $product->category->id : 0;
        //                 $PBDS->save();
        //             }
        //         }
        //     }
        // }
        DB::commit();
        flash_info(trans('Cập nhật hàng thành công'));
        return redirect()->route('sales.don_hang_ban.get.list');
    }


    //autocomplet staff
    public function autocompleteStaffTV(Request $request){
        $keyword = $request->all()['query'];
        // return response()->json($data) query;
        $products = Staffs::where(function($q) use ($keyword){
            $q->where('first_name','LIKE','%'.$keyword.'%');
            $q->orWhere('last_name','LIKE','%'.$keyword.'%');
        });
        if (!empty($request->array)) {
            $products = $products->whereNotIn('id',$request->array);
        }
        $products = $products->latest()->limit(5)->get();
        $product = $request->all()['product'];
        if ($products != null) {
            $results = '';
            foreach ($products as $key => $value) {
                $results.='<li>
                    <img src="https://www.tm-town.com/assets/default_male600x600-79218392a28f78af249216e097aaf683.png" alt='.$value->full_name.'""/>
                    <a class="append-nv-tv'.$product.'" href="javascript:void(0)" data-id="'.$value->getId().'">'.$value->full_name.' <br /></a>
                </li>';
            }
            return response()->json(['status' => 'OK','html' => $results,'request' => $request->all()]);
        }
        return response()->json(['status' => 'ERROR']);
    }

    //appends nhan vien Tua
    public function findStaffTV(Request $request){
        $data = $request->all();
        $staff = Staffs::findById($data['staff_id']);
        $product = $data['product'];
        $html = view("sales::don_hang_ban.staffs.staff_tv",compact('staff','product'))->render();
        return response()->json(['status' => 'OK','html' => $html]);
    }

    //autocomplet staff
    public function autocompleteStaffTua(Request $request){
        $keyword = $request->all()['query'];
        // return response()->json($data) query;
        $products = Staffs::where(function($q) use ($keyword){
            $q->where('first_name','LIKE','%'.$keyword.'%');
            $q->orWhere('last_name','LIKE','%'.$keyword.'%');
        });
        if (!empty($request->array)) {
            $products = $products->whereNotIn('id',$request->array);
        }
        $products = $products->latest()->limit(5)->get();
        $product = $request->all()['product'];
        if ($products != null) {
            $results = '';
            foreach ($products as $key => $value) {
                $results.='<li>
                    <img src="https://www.tm-town.com/assets/default_male600x600-79218392a28f78af249216e097aaf683.png" alt='.$value->full_name.'""/>
                    <a class="append-nv-tua'.$product.'" href="javascript:void(0)" data-id="'.$value->getId().'">'.$value->full_name.' <br /></a>
                </li>';
            }
            return response()->json(['status' => 'OK','html' => $results,'request' => $request->all()]);
        }
        return response()->json(['status' => 'ERROR']);
    }

    //appends nhan vien Tua
    public function findStaffTua(Request $request){
        $data = $request->all();
        $staff = Staffs::findById($data['staff_id']);
        $product = $data['product'];
        $html = view("sales::don_hang_ban.staffs.staff_tua",compact('staff','product'))->render();
        return response()->json(['status' => 'OK','html' => $html]);
    }

    public function getExport(Request $request){
        $billings = BillingOrder::getPaginate(10);
        $view = 'file::ExportExcel.ExportSales';
        return Excel::download(new Export($billings,$view), 'viken'.'ĐH'.rand(10,100).'.xlsx');
    }

}










