<?php 

namespace TTSoft\About\Repositories\Eloquent;

use TTSoft\About\Repositories\AboutRepository;
use TTSoft\About\Entities\About;
/**
* @return class name use repository
*/
class EloquentAboutRepository implements AboutRepository
{
	protected $model;

	public function __construct(About $category){
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