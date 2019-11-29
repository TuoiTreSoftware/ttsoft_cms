<?php 

namespace TTSoft\Post\Repositories;


interface CategoryRepository{

	public function findAll($sort = 'DESC' , $paginate = TRUE);

	public function findById($id);

	public function create($request);

	public function update($id , $request);
}