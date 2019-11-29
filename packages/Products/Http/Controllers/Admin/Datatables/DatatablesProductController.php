<?php

namespace TTSoft\Products\Http\Controllers\Admin\Datatables;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Products\Entities\Product;
use File;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class DatatablesProductController extends Controller
{
    public function getListAjax(Request $request){
        $ref_lang = session()->has('language') ? session()->get('language') : config('app.locale');
        $products = Product::getContentAll($ref_lang);
        $request = session()->get('request');

        if (isset($request['title']) && !empty($request['title'])) {
            $products = $products->where('products.title','like','%'.$request['title'].'%');
        }

        if (isset($request['product_category_id']) && !empty($request['product_category_id'])) {
            $products = $products->where('products.product_category_id','=',$request['product_category_id']);
        }

        if (isset($request['fprice']) && !empty($request['fprice'])) {
            $products = $products->where('products.price','>=',$request['fprice']);
        }

        if (isset($request['tprice']) && !empty($request['tprice'])) {
            $products = $products->where('products.price','<=',$request['tprice']);
        }
        $products = $products->get();
        return Datatables::of($products)
            ->addColumn('languages', function($item) use ($ref_lang){
                $html = '';
                foreach(config('base.language') as $lang => $name):
                    if($lang != $ref_lang):
                        $html .=  '<a href="'.route("products.get.edit",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Edit related language for this record">';
                            if(get_language_product($lang,$item->id) > 0):
                                $html .= '<i class="fa fa-edit"></i> ';
                            else:
                                $html .= '<i class="fa fa-plus"></i> ';
                            endif;
                        $html .= '</a>';
                    else:
                        $html .= '<a href="'.route("products.get.edit",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Current record">
                            <i class="fa fa-check text-success"></i> 
                        </a>';
                    endif;
                endforeach;
                return $html;
            })
            ->addColumn('check', '<input type="checkbox" class="mycheckbox" id="check" value="{{ $id }}">')
            ->editColumn('image', function($item){
                return '<img src="'.$item->getImage().'" width="50">';
            })
            ->addColumn('catogory_title', function ($item) {
                return $item->category ? $item->category->title : null;
            })
            ->editColumn('title', function ($item) {
                return '<a href="'.$item->getRoute().'" target="_blank">'.$item->getTitle().'</a>';
            })
            ->editColumn('price', function ($item) {
                $price = "";
                if($item->price > $item->price_sale && $item->price_sale > 0):
                    $price = format_price($item->price_sale).'đ<br>
                    <span style="color: red; text-decoration: line-through;">'.format_price($item->price).'đ</span>';
                else:
                    $price = format_price($item->price).'đ';
                endif;
                return $price;
            })
            ->addColumn('action', function($item){
                $actions = '';
                $actions .= '<a href="'.route("products.get.edit",$item->id).'" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
                    <i class="ti-marker-alt"></i>
                    </a>'; 
                $actions .= '<a href="'.route("products.get.delete",$item->id).'" class="text-dark" title="Delete" data-toggle="tooltip">
                    <i class="ti-trash"></i>
                </a>';
                return $actions;
            })
            ->addColumn('status', function($item) {
                if($item->status == 1){
                    return '<span class="label label-success font-weight-100">Enabled</span>';
                } else {
                    return '<span class="label label-danger font-weight-100">Disabled</span>';
                }
            })
            ->editColumn('created_at', function ($item) {
                return $item->created_at ? with(new Carbon($item->created_at))->format('m/d/Y') : '';
            })
            ->rawColumns(['check', 'action','languages','status','image','catogory_title','title','price'])
            ->make(true);
    }
}
