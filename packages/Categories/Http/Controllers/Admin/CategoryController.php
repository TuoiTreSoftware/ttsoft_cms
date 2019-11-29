<?php

namespace TTSoft\Categories\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Categories\Repositories\Eloquent\EloquentUserRepository;
use TTSoft\Categories\Events\EventLogin;
use TTSoft\Categories\Http\Resources\UserResource;
use TTSoft\Categories\Entities\Category;
use TTSoft\Categories\Http\Requests\Admin\CategoryRequest;
class CategoryController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentUserRepository $repository){
		$this->repository = $repository;
	}
    
    public function getList($category){
        $data = Category::paginate(10);
        return view("categories::category.list",compact('data','category'));
    }

    public function getCreate($category){
        return view("categories::category.create",compact('category'));
    }

    public function postCreate($category, CategoryRequest $request){
        $data = $request->all();
        $insert = new Category($data);
        $insert->save();
        return redirect()->route('categories.get.list',$category);
    }
     public function getEdit($id){
        $data = Category::findById($id);
        $parent = Category::findAll();
        return view("categories::category.edit",compact('data','parent'));
    }
    public function postEdit($id, CategoryRequest $request){
        $data = Category::findById($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('categories.get.list');

    }
    public function getDelete($id){
        $data = Category::findById($id);
        $data->delete();
        return redirect()->route('categories.get.list',$data->prefix);

    }

}
