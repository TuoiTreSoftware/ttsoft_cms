<?php 

namespace TTSoft\Post\Repositories\Eloquent;

use TTSoft\Post\Repositories\TagRepository;

use TTSoft\Post\Entities\Tag;

/**
* @return class name use repository
*/
class EloquentTagRepository implements TagRepository
{
	
	protected $model;

	public function __construct(Tag $tag){
		$this->model = $tag;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}
}