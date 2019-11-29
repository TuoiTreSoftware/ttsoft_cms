<?php

namespace TTSoft\Barcode\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Barcode\Repositories\BarcodeRepositoryInterface;
class BarcodeController extends Controller
{
	public function getGenerate () {
    	return view("barcode::index");
	}
}