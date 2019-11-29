<?php

namespace TTSoft\Categories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Categories\Events\EventLogin;
use TTSoft\Categories\Http\Resources\UserResource;
use TTSoft\Categories\Entities\ProductCategory;
use TTSoft\Categories\Http\Requests\Admin\CategoryRequest;
class ProductCategoryController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */

	public function __construct(){
	}
    
    public function getList(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('language',$ref_lang);
        return view("categories::product_category.list");
    }

    public function getCreate(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        return view("categories::product_category.create",compact('ref_lang'));
    }

    public function postCreate(Request $request){
        $data = $request->all();
        $category = new ProductCategory;
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->slug = str_slug($request->slug);
        $category->save();
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $category->createContent($ref_lang);
        return redirect()->route('product.categories.get.list');
    }
    public function getEdit($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $data = ProductCategory::findById($id);
        $content = $data->getFirstLangCurrent($ref_lang);
        return view("categories::product_category.edit",compact('data','ref_lang','content'));
    }
    public function postEdit($id, Request $request){
        $category = ProductCategory::findById($id);
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->slug = str_slug($request->slug);
        $category->save();
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $category->createContent($ref_lang);
        return redirect()->route('product.categories.get.list');

    }
    public function getDelete($id){
        $data = ProductCategory::findById($id);
        $data->delete();
        return redirect()->route('product.categories.get.list');

    }

}
