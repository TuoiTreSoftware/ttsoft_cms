<?php 

namespace TTSoft\Post\Repositories\Eloquent;

use TTSoft\Post\Repositories\CategoryRepository;
use TTSoft\Post\Entities\Category;
/**
* @return class name use repository
*/
class EloquentCategoryRepository implements CategoryRepository
{
	protected $model;

	public function __construct(Category $category){
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