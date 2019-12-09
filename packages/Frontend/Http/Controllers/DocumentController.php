<?php

namespace TTSoft\Frontend\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TTSoft\Documents\Entities\DocumentVersion;
use TTSoft\Documents\Entities\DocumentMenu;
use TTSoft\Documents\Entities\Document;
use TTSoft\Post\Entities\Post;

class DocumentController extends Controller
{

	public function getIndex(){
        return view('frontend::documents.index');
    }

    public function getDocument(){
        return redirect('/documents/v1.5.0/docs-start-wellcome');
    }

}
