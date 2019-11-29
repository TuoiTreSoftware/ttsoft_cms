<?php 

namespace TTSoft\Contact\Repositories;


interface ContactRepository{
	public function findAll($sort = 'DESC' , $paginate = TRUE);
}