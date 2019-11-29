<?php 

namespace TTSoft\Post\Repositories\Eloquent;

use TTSoft\Post\Repositories\PostRepository;
use TTSoft\Post\Entities\Post;
/**
* @return class name use repository
*/
class EloquentPostRepository implements PostRepository
{
	
	protected $model;

	public function __construct(Post $post){
		$this->model = $post;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}
}