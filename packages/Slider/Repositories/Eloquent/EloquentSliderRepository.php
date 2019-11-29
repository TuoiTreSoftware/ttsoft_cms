<?php 

namespace TTSoft\Slider\Repositories\Eloquent;

use TTSoft\Slider\Repositories\SliderRepository;

use TTSoft\Slider\Entities\Slider;
/**
* @return class name use repository
*/
class EloquentSliderRepository implements SliderRepository
{
	
	protected $model;

	public function __construct(Slider $slider){
		$this->model = $slider;
	}

	public function findAll($sort = 'DESC' , $paginate = TRUE){
		$category = $this->model->orderBy('id',$sort);
		if ($paginate) {
			return $category->paginate(env('PAGINATE_PAGER'));
		}
		return $category->get();
	}
}