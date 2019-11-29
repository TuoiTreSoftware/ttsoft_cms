<?php 

namespace TTSoft\Slider\Repositories;


interface SliderRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);
}