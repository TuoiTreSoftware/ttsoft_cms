<?php

namespace TTSoft\Menu\Http\Controllers\Admin\Datatables;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Menu\Entities\MenuCategory;
use File;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class DatatablesController extends Controller
{

    public function getListAjax(Request $request){
        $ref_lang = (session()->has('language')) ? session()->get('language') : config('app.locale');
        $pages = MenuCategory::selectRaw('id,title,identify,status,created_at,updated_at,lang,status')->where('lang',$ref_lang)->latest('id')->get();
        return Datatables::of($pages)
            // ->addColumn('languages', function($item) use ($ref_lang){
            //     $html = '';
            //     foreach(config('base.language') as $lang => $name):
            //         if($lang != $ref_lang):
            //             $html .=  '<a href="'.route("admin.menu.cate.get.getEditMenu",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Edit related language for this record">';
            //                 if(get_language_product($lang,$item->id) > 0):
            //                     $html .= '<i class="fa fa-edit"></i> ';
            //                 else:
            //                     $html .= '<i class="fa fa-plus"></i> ';
            //                 endif;
            //             $html .= '</a>';
            //         else:
            //             $html .= '<a href="'.route("admin.menu.cate.get.getEditMenu",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Current record">
            //                 <i class="fa fa-check text-success"></i> 
            //             </a>';
            //         endif;
            //     endforeach;
            //     return $html;
            // })
            ->addColumn('check', '<input type="checkbox" class="mycheckbox" id="check" value="{{ $id }}">')
            ->addColumn('action', '<a href="{{ route("admin.menu.cate.get.getEditMenu",$id) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
                                        <i class="ti-marker-alt"></i></a> 
                                    <a href="#" class="text-dark" title="Delete" data-toggle="tooltip">
                                        <i class="ti-trash"></i></a>
                        ')
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
            ->rawColumns(['check', 'action','languages','status'])
            ->make(true);
    }
}
