<?php 

namespace TTSoft\Page\Repositories\Eloquent;

use TTSoft\Page\Repositories\PageRepository;

use TTSoft\Page\Entities\Page;
/**
* @return class name use repository
*/
class EloquentPageRepository implements PageRepository
{
	
	protected $model;

	public function __construct(Page $page){
		$this->model = $page;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}
}