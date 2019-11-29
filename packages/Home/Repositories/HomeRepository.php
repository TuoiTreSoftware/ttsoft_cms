<?php 

namespace TTSoft\Home\Repositories;


interface HomeRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);

	public function findById($id);

	public function create($request);

	public function update($id , $request);
}