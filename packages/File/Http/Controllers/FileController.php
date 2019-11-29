<?php

namespace TTSoft\File\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use File;
class FileController extends Controller
{
	public function ckfinder(){
		return view('file::file.index');
	}
}
