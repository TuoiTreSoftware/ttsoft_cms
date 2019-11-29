<?php 

namespace TTSoft\Media\Repositories\Eloquent;

use TTSoft\Media\Repositories\MediaRepository;

use TTSoft\Media\Entities\Media;
/**
* @return class name use repository
*/
class EloquentMediaRepository implements MediaRepository
{
	
	protected $model;

	public function __construct(Media $media){
		$this->model = $media;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}
}