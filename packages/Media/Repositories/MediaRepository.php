<?php 

namespace TTSoft\Media\Repositories;


interface MediaRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);
}