<?php

namespace TTSoft\Products\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        return redirect()->route('admin.attribute.get.list');
    }
    public function getEdit($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $data = Attribute::findById($id);

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
        return redirect()->route('admin.attribute.get.list');

    }
    public function getDelete($id){
        $data = Attribute::findById($id);
        $data->delete();
        return redirect()->route('admin.attribute.get.list');

    }

}
