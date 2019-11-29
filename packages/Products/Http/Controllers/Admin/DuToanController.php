<?php

namespace TTSoft\Products\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Products\Repositories\ProductRepositoryInterface;
use TTSoft\Products\Entities\Product;
use TTSoft\Products\Http\Requests\ValidationProductRequest;
use TTSoft\Products\Entities\ProductImage;
use TTSoft\Products\Entities\ProductTag;
use Illuminate\Support\Facades\DB;
use TTSoft\Products\Entities\TSDT;
class DuToanController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */

	public function getList(Request $request)
	{
   		return view("product::dutoan.list");
	}





	/**
	 * @author Dat Nguyen
	 * Tham số dự toán
	 * @return function()
	 */
	

    public function getThamSo(Request $request){
        return view("product::dutoan.thamso");
    }

    public function postThamSo(Request $request){
        $data = $request->all();
        TSDT::create($data);
        flash_success(trans('Thêm hệ số thành công'));
        return redirect()->route('sales.dutoan.get.tham-so');
    }
}
