<?php

namespace TTSoft\File\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use File;
use Excel;
use TTSoft\Products\Entities\Product;

class ExportController extends Controller 
{
	public function getExport(){
		$data = Product::findAll();
		$view = 'file::ExportExcel.ExportProduct';
	 return Excel::download(new Export($data,$view), 'invoices.xlsx');
	}
}
