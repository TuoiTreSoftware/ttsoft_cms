<?php

namespace TTSoft\Base\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class AdminController extends Controller
{

    public function lang($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
