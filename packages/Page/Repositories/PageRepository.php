<?php 

namespace TTSoft\Page\Repositories;


interface PageRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);
}