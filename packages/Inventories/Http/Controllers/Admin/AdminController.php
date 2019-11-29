<?php

namespace TTSoft\Inventories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class AdminController extends Controller
{

    public function index(Request $request){
    }

    public function get_nhap_kho(Request $request){
        return view("inventories::nhap_kho.list");
    }

    public function getAdd(Request $request){
        return view("inventories::nhap_kho.create");
    }

    public function get_xuat_kho(Request $request){
        return view("inventories::xuat_kho.list");
    }

    public function add_xuat_kho(Request $request){
        return view("inventories::xuat_kho.create");
    }

    public function get_bctk(Request $request){
        return view("inventories::bao_cao.ton_kho");
    }

    public function getThongbao(){
    }
}
