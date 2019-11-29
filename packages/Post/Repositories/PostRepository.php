<?php 

namespace TTSoft\Post\Repositories;


interface PostRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);
}