<?php

namespace TTSoft\Categories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Categories\Entities\Inventories;
class AdminController extends Controller
{
    public function getList(){
        $data = Inventories::findAll();
        return view("categories::categories_inventories.list",compact('data'));
    }
    public function getCreate(){
        $parent = Inventories::findAll();
        return view("categories::categories_inventories.create",compact('parent'));
    }
    public function postCreate(Request $request){
        $data = $request->all();
        $insert = new Inventories($data);
        $insert->save();
        return redirect()->route('categories.inventories.get.list');
    }
     public function getEdit($id){
        $data = Inventories::findById($id);
        $parent = Inventories::findAll();
        return view("categories::categories_inventories.edit",compact('data','parent'));
    }
    public function postEdit($id, Request $request){
        $data = Inventories::findById($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('categories.inventories.get.list');

    }
    public function getDelete($id){
        $data = Inventories::findById($id);
        $data->delete();
        return redirect()->route('categories.inventories.get.list');

    }

}
