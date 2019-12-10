<?php

namespace TTSoft\Frontend\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TTSoft\Documents\Entities\DocumentVersion;
use TTSoft\Documents\Entities\DocumentMenu;
use TTSoft\Documents\Entities\Document;
use TTSoft\Post\Entities\Post;
use TTSoft\Contact\Entities\Contact;
use Session;

class DocumentController extends Controller
{

	public function getIndex(){
        return view('frontend::documents.index');
    }

    public function getDocument(){
        return redirect('/documents/v1.5.0/docs-start-wellcome');
    }

    public function getDownloadTemplate(Request $request)
    {
    	return view('frontend::documents.template_download');
    }

    public function postDownloadTemplate(Request $request){
    	$data = $request->all();
    	$info_regis = new Contact($data);
    	/*if($data['subject'] === 'elite'){
    		
    	}*/
    	if($info_regis->save()){
		    return redirect()->back()->with('message', 'success');
    	}
	    return redirect()->back()->with('message', 'error');
    }

}
