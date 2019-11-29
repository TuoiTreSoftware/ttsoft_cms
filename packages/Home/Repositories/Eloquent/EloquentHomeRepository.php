<?php 

namespace TTSoft\Home\Repositories\Eloquent;

use TTSoft\Home\Repositories\HomeRepository;
use TTSoft\Home\Entities\Home;
/**
* @return class name use repository
*/
class EloquentHomeRepository implements HomeRepository
{
	protected $model;

	public function __construct(Home $category){
		$this->model = $category;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}

	public function findById($id){
		$category = $this->model->find($id);
		if (!$category) {
			abort(404);
		}
		return $category;
	}

	public function create($data){
		$this->model->create([
			'name' => $data['name'],
			'slug' => str_slug($data['name']),
			'parent_id' => $data['parent_id'],
			'meta_description' => $data['meta_description'],
		]);
	}

	public function update($id , $request){

	}

	public function getCateParent(){
		return $this->model->where('parent_id',0)->get();
	}
}