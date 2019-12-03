<?php

namespace TTSoft\Documents\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Documents\Entities\DocumentVersion;

class DocumentVersionController extends Controller
{

    public function getCreate(Request $request){
    	$versions = DocumentVersion::get();
        return view('documents::version.create',compact('versions'));
    }

    public function postCreate(Request $request){
    	$data = $request->all();
    	$version = new DocumentVersion($data);
    	$version->save();

        return redirect()->back();
    }

    public function getEdit(Request $request, $id){
    	$versions = DocumentVersion::get();
    	$version = DocumentVersion::find($id);
        return view('documents::version.edit',compact('versions','version'));
    }

    public function postEdit(Request $request, $id){
    	$data = $request->all();
    	$version = DocumentVersion::find($id);
    	$version->update($data);

        return redirect()->back();
    }

    public function delete($id){
    	$version = DocumentVersion::find($id);
    	$version->delete();
        return redirect()->route('get.create.document_version');
    }

}
