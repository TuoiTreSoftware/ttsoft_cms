<?php

namespace TTSoft\Products\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Categories\Events\EventLogin;
use TTSoft\Categories\Http\Resources\UserResource;
use TTSoft\Categories\Entities\ProductCategory;
use TTSoft\Categories\Http\Requests\Admin\CategoryRequest;
use TTSoft\Products\Entities\Attribute;
class AttributeController extends Controller
{   
    public function getList(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('language',$ref_lang);
        return view("product::attribute.list");
    }

    public function getCreate(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        return view("product::attribute.create",compact('ref_lang'));
    }

    public function postCreate(Request $request){
        $data = $request->all(['title','slug','parent_id','color','status']);
        $attribute = new Attribute($data);
        $attribute->save();
        // $category->title = $request->title;
        // $category->parent_id = $request->parent_id;
        // $category->slug = str_slug($request->slug);
        // $category->save();
        // $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        // $category->createContent($ref_lang);
        return redirect()->route('admin.attribute.get.list');
    }
    public function getEdit($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $data = Attribute::findById($id);

        // $content = $data->getFirstLangCurrent($ref_lang);
        return view("product::attribute.edit",compact('data','ref_lang','content'));
    }
    public function postEdit($id, Request $request){
        $attribute = Attribute::findById($id);
        $attribute->title = $request->title;
        $attribute->parent_id = $request->parent_id;
        $attribute->slug = str_slug($request->slug);
        $attribute->color = $request->color;
        $attribute->status = $request->status;
        $attribute->save();
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        // $attribute->createContent($ref_lang);
        return redirect()->route('admin.attribute.get.list');

    }
    public function getDelete($id){
        $data = Attribute::findById($id);
        $data->delete();
        return redirect()->route('admin.attribute.get.list');

    }

}
