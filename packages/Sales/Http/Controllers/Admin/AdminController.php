<?php

namespace TTSoft\Sales\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Sales\Repositories\Eloquent\EloquentUserRepository;
class AdminController extends Controller
{
    public function get_so(Request $request){
    	return view("sales::don_hang_ban.list");
    }

    public function get_return(Request $request){
    	return view("sales::tra_hang_ban.list");
    }

     public function add_return(Request $request){
    	return view("sales::tra_hang_ban.create");
    }
    
    public function getThongbao(){
    	return view("bconnect::front.thongbao.list");
    }
}
