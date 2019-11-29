<?php

namespace TTSoft\Inventories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Inventories\Http\Requests\Admin\StatusRequest;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_details;
use TTSoft\Inventories\Entities\VoucherDetail as Doc_headers;
use TTSoft\Customers\Entities\Customer;
use TTSoft\Categories\Entities\Category;
use Carbon\Carbon;
use TTSoft\Inventories\Http\Requests\Admin\DocHeaderRequest;

class ReportinvantoriesController extends Controller
{
    //nhap kho
	public function getReportNXT($kho = 'WAREHOUSE'){
		$data = Category::where('prefix',$kho)->get();
		return view("inventories::bao_cao.ton_kho",compact('data'));
	}
}
