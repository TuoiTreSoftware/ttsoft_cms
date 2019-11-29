<?php 

namespace TTSoft\Post\Repositories;


interface TagRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);
}