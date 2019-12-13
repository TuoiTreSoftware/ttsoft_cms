<?php

namespace TTSoft\Media\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Media\Repositories\Eloquent\EloquentMediaRepository;
use Illuminate\Support\Facades\Auth;
use TTSoft\Media\Entities\Media;
use File;
class GalleryController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentMediaRepository $repository){
		$this->repository = $repository;
	}

    public function getList(Request $request){
        return view('media::gallery.list');
    }

}
