<?php

namespace TTSoft\Documents\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Documents\Entities\DocumentVersion;
use TTSoft\Documents\Entities\DocumentMenu;
use TTSoft\Documents\Entities\Document;

class DocumentController extends Controller
{

    public function getList(Request $request){
    	$documents = Document::get();
        return view('documents::documents.list',compact('documents'));
    }

    public function getCreate(Request $request){
        $versions = DocumentVersion::get();
        $menus = DocumentMenu::get();
        return view('documents::documents.create',compact('versions','menus'));
    }

    public function postCreate(Request $request){
    	$data = $request->all();
    	$document = new Document($data);
    	$document->save();

        return redirect()->route('get.list.document');
    }

    public function getEdit(Request $request, $id){
    	$document = Document::find($id);
    	$versions = DocumentVersion::get();
        $menus = DocumentMenu::get();
        return view('documents::documents.edit',compact('document','versions','menus'));
    }

    public function postEdit(Request $request, $id){
    	$data = $request->all();
    	$version = Document::find($id);
    	$version->update($data);

        return redirect()->back();
    }

    public function delete($id){
    	$version = Document::find($id);
    	$version->delete();
        return redirect()->route('get.list.document');
    }

}
