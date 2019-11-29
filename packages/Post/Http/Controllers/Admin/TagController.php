<?php

namespace TTSoft\Post\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Post\Repositories\Eloquent\EloquentTagRepository;
use TTSoft\Post\Http\Requests\Admin\Tag\TagCreateReuest;
use TTSoft\Post\Entities\Tag;
class TagController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentTagRepository $repository){
		$this->repository = $repository;
	}


    public function getList(Request $request){
    	$tags = $this->repository->findAll();
        return view('post::tags.index',compact('tags'));
    }

    public function getCreate(){
        return view('post::tags.create');
    }

    public function postCreate(TagCreateReuest $request){
    	$data = $request->all();
    	$data['slug'] = !empty($data['slug']) ? $data['slug'] : $data['name'];
    	$data['status'] = 1;
    	Tag::create($data);
    	flash_success(trans('Add Tag Successfull'));
        return redirect()->route('admin.post-tags.get.list');
    }
}
