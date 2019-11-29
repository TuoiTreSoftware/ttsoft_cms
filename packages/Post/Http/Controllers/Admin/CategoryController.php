<?php

namespace TTSoft\Post\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Post\Repositories\Eloquent\EloquentCategoryRepository;
use TTSoft\Post\Entities\Category;
class CategoryController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentCategoryRepository $repository){
		$this->repository = $repository;
	}


    public function getList(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$categories = $this->repository->findAll();
    	$cateParents = $this->repository->getCateParent();
        session()->put('language',$ref_lang);
        return view('post::categories.index',compact('categories','cateParents'));
    }

    public function postCreate(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$categories = request()->all();
    	$category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->meta_description = $request->content;
        $category->save();
        $category->createContent($ref_lang);
    	flash_success(trans('Add Category Successful'));
    	return redirect()->route('admin.post-categories.get.list');
    }


    public function getDelete($id){
        $category = Category::findById($id);
        $category->delete();
        flash_success(trans('Delete Category Successful'));
        return redirect()->route('admin.post-categories.get.list');
    }

    public function getEdit($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $cate = Category::find($id);
        $content = $cate->getFirstLangCurrent($ref_lang);
        $categories = $this->repository->findAll();
        $cateParents = $this->repository->getCateParent();
        return view('post::categories.index',compact('categories','cateParents','cate','content'));
    }

    public function postEdit($id , Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $category = Category::findById($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->meta_description = $request->content;
        $category->save();
        $category->createContent($ref_lang);
        flash_success(trans('Update Category Successful'));
        return redirect()->route('admin.post-categories.get.list');
    }
}
