<?php

namespace TTSoft\Frontend\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TTSoft\Documents\Entities\DocumentMenu;
use TTSoft\Documents\Entities\Document;

class DocumentController extends Controller
{

    public function getDocument(Request $request){
    	$menus = DocumentMenu::get();
        return view('frontend::documents.documents',compact('menus'));
    }

}
