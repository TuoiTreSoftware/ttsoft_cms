<?php

namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Frontend\Events\NotifyFormContact;
use TTSoft\Post\Entities\Post;

use SEOMeta;
use OpenGraph;
use Twitter;
## or
use SEO;

class FrontendController extends Controller
{

    public function getHome(Request $request){
        return view('frontend::home.index');
    }

    public function getNewsDetail($slug){
        $data = Post::where('slug',$slug)->first();
        return view('frontend::documents.documents',compact('data'));
    }

}
