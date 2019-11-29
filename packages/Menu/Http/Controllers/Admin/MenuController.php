<?php

namespace TTSoft\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use TTSoft\Menu\Entities\Menu;
use TTSoft\Menu\Entities\MenuCategory;
use Illuminate\Support\Facades\Session;
use TTSoft\Page\Entities\Page;
use TTSoft\Post\Entities\Post;
use TTSoft\Post\Entities\Category;
use Carbon\Carbon;
use TTSoft\Courses\Entities\Courses;
class MenuController extends Controller
{
    public function getList(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('language',$ref_lang);
    	return view('menu::menu.index',compact('ref_lang'));
    }

    public function getCreateMenu(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        return view('menu::menu.create',compact('ref_lang'));
    }

    public function postCreateMenu(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $cate = new MenuCategory();
        $cate->title    = $request->title;
        $cate->identify = $request->identify;
        $cate->status   = $request->status;
        $cate->lang     = $ref_lang;
        $cate->save();
        flash_info(trans("Tạo menu thành công"));
        if (isset($request->save)) {
            return redirect()->route('admin.menu.get.list');
        }
        if (isset($request->save_edit)) {
            return redirect()->route('admin.menu.cate.get.getEditMenu',$cate->id);
        }
    }

    public function getEditMenu($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $cate = MenuCategory::findById($id);
        return view('menu::menu.edit_category',compact('ref_lang','cate'));
    }


    public function postEditMenu($id,Request $request){
        $ref_lang = $request->lang;
        $cate = MenuCategory::findById($id);
        $cate->title    = $request->title;
        $cate->status   = $request->status;
        $cate->save();

        $array = $request->menu_data;
        $array = stripslashes($array);
        $avb = json_decode($array, true);
        extract_value($avb,$parent=0,$i=1);

        flash_info(trans("Cập nhật menu thành công"));
        if (isset($request->save)) {
            return redirect()->route('admin.menu.get.list');
        }
        if (isset($request->save_edit)) {
            return redirect()->route('admin.menu.cate.get.getEditMenu',$cate->id.'?ref_lang='.$ref_lang);
        }
    }

    //add category post
    public function postAddCatePost(Request $request){
    	$array = $request->category;
        if(!empty($array)){
        	foreach($array as $id){
        		$cateProduct = Category::getContentAll($request->lang)->find($id);
        		$menu = new Menu;
        		$menu->title 	= $cateProduct->title;
        		$menu->slug 	= $cateProduct->slug;
        		$menu->category = $request->category_menu;
                $menu->lang     = $request->lang;
        		$menu->url 		= $cateProduct->getRoute();
                $menu->updated_at = \Carbon\Carbon::now();
                $menu->parent_id = 0;
        		$menu->save();
        	}
        	flash_info(trans('Thêm menu thành công.'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category_menu.'?ref_lang='.$request->lang);
        }else{
        	flash_error(trans('Vui lòng chọn mục muốn thêm.'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category_menu.'?ref_lang='.$request->lang);
        }

    }
    /*add bài viêt */
     public function postAddPost(Request $request){
        $array = $request->post;
        if(!empty($array)){
            foreach($array as $id){
                $post = Post::getContentAll($request->lang)->find($id);
                $catepost = Category::where('id',$post->parent_id)->first();
                $menu = new Menu;
                $menu->title    = $post->getTitle();
                $menu->slug     = $post->slug;
                $menu->category = $request->category;
                $menu->lang = $request->lang;
                $menu->url      = $post->getRoute();
                $menu->updated_at = \Carbon\Carbon::now();
                $menu->parent_id = 0;
                $menu->save();
            }
            flash_info(trans('Thêm menu thành công.'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
        }else{
        	flash_error(trans('Vui lòng chọn mục muốn thêm.'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
        }

    }
    
    public function postAddCustom(Request $request){
    	$menu = new Menu;
		$menu->title 	= $request->custom_menu_title;
		$menu->slug 	= str_slug($request->custom_menu_title);
		$menu->category = $request->category;
        $menu->lang     = $request->lang;
		$menu->url 		= $request->custom_menu_url;
		$menu->parent_id = 0;
		$menu->save();
		flash_info(trans('Thêm menu thành công.'));
    	return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
    }
    public function postAddPage(Request $request){
        $array = $request->page;
        if(!empty($array)){
            foreach($array as $id){
                $page = Page::find($id);
                $menu = new Menu;
                $menu->title    = $page->getTitle();
                $menu->slug     = $page->getRoute();
                $menu->category = $request->category;
                $menu->lang     = $request->lang;
                $menu->url      = $page->getRoute();
                $menu->parent_id = 0;
                $menu->save();
            }
            flash_info(trans('Thêm menu thành công'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
        }else{
        	flash_error(trans('Vui lòng chọn mục muôn thêm'));
            return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
        }
    }
    // delete menu

    public function getDelete($id){
    	$menu = Menu::find($id);
    	$menu->delete();
    	flash_info(trans('Xóa Menu thành công.'));
    	return redirect()->back();
    }
    public function getUpdate($id){
    	$menu = Menu::find($id);
    	return view('menu::menu.edit',['menu' => $menu]);
    }
    public function postUpdate($id,Request $request){
    	$menu = Menu::find($id);
    	$menu->title 	= $request->title;
    	$menu->url 		= $request->url;
    	$menu->update();
    	flash_info(trans('Cập nhật Menu thành công.'));
    	return redirect()->route('admin.menu.cate.get.getEditMenu',$menu->category.'?ref_lang='.$menu->lang);
    }
    
    public function saveTexthtml(Request $request){
        $menu = new Menu;
        $menu->title    = $request->save_menu_html;
        $menu->slug     = str_slug($request->custom_menu_title);
        $menu->category = $request->category;
        $menu->lang     = $request->lang;
        $menu->url      = '';
        $menu->parent_id = 0;
        $menu->save();
        flash_info(trans('Thêm Menu thành công.'));
        return redirect()->route('admin.menu.cate.get.getEditMenu',$request->category.'?ref_lang='.$request->lang);
    }
}
