<?php

namespace TTSoft\Post\Http\Controllers\Admin\Datatables;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Post\Entities\Post;
use File;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class DatatablesPostController extends Controller
{
    public function getListAjax(Request $request){
        $ref_lang = session()->has('language') ? session()->get('language') : config('app.locale');
        $posts = Post::getContentAll($ref_lang)->get();
        return Datatables::of($posts)
            ->addColumn('languages', function($item) use ($ref_lang){
                $html = '';
                foreach(config('base.language') as $lang => $name):
                    if($lang != $ref_lang):
                        $html .=  '<a href="'.route("admin.post.get.edit",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Edit related language for this record">';
                            if(get_language_post($lang,$item->id) > 0):
                                $html .= '<i class="fa fa-edit"></i> ';
                            else:
                                $html .= '<i class="fa fa-plus"></i> ';
                            endif;
                        $html .= '</a>';
                    else:
                        $html .= '<a href="'.route("admin.post.get.edit",$item->id).'?ref_lang='.$lang.'" class="tip" data-original-title="Current record">
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
                return $item->getCategoryTitle();
            })
            ->addColumn('action', function($item){
                $actions = '';
                $actions .= '<a href="'.route("admin.post.get.edit",$item->id).'" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
                    <i class="ti-marker-alt"></i>
                    </a>'; 
                $actions .= '<a href="'.route("admin.post.get.delete",$item->id).'" class="text-dark" title="Delete" data-toggle="tooltip">
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
            ->rawColumns(['check', 'action','languages','status','image','catogory_title'])
            ->make(true);
    }
}
