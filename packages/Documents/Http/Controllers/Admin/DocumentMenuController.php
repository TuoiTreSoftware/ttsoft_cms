<?php

namespace TTSoft\Documents\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Documents\Entities\DocumentMenu;

class DocumentMenuController extends Controller
{

    public function getCreate(Request $request){
    	$menus = DocumentMenu::get();
        return view('documents::menu.create',compact('menus'));
    }

    public function postCreate(Request $request){
    	$data = $request->all();
    	$menus = new DocumentMenu($data);
    	$menus->save();

        return redirect()->back();
    }

    public function getEdit(Request $request, $id){
    	$menus = DocumentMenu::get();
    	$menu = DocumentMenu::find($id);
        return view('documents::menu.edit',compact('menus','menu'));
    }

    public function postEdit(Request $request, $id){
    	$data = $request->all();
    	$menu = DocumentMenu::find($id);
    	$menu->update($data);

        return redirect()->back();
    }

    public function delete($id){
    	$menu = DocumentMenu::find($id);
    	$menu->delete();
        return redirect()->route('get.create.document_menu');
    }

}
