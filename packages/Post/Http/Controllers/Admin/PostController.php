<?php

namespace TTSoft\Post\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Post\Repositories\Eloquent\EloquentPostRepository;
use TTSoft\Post\Repositories\Eloquent\EloquentCategoryRepository;
use TTSoft\Post\Entities\Post;
use TTSoft\Post\Entities\Category;
use TTSoft\Post\Entities\Tag;
use Illuminate\Support\Facades\DB;
use TTSoft\Post\Http\Requests\Admin\Post\PostCreateRequest;
use TTSoft\Post\Http\Requests\Admin\EditRequest;
use Carbon\Carbon;
use File;
class PostController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentPostRepository $repository , EloquentCategoryRepository $cateRepository){
		$this->repository = $repository;
		$this->cateRepository = $cateRepository;
	}


    public function getList(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        session()->put('language',$ref_lang);
        $posts = Post::getContentAll($ref_lang)->paginate(15);
        return view('post::posts.list',compact('posts','ref_lang'));
    }

    public function getCreate(){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$categories = Category::getContentAll($ref_lang)->get();
        return view('post::posts.create',compact('categories','ref_lang'));
    }

    public function postCreate(PostCreateRequest $request){
    	$data = $request->all();
    	DB::beginTransaction();
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
        $data['start_display'] = Carbon::parse($data['start_display'])->format('Y-m-d H:i:s');
        $data['slug'] = !empty($data['slug']) ? str_slug($data['slug']) : str_slug($data['name']);
        $data['status'] = !empty($data['status']) ? $data['status'] : 0;
        $data['author_id'] = \Auth::guard()->user()->id;
        unset($data['category']);
    	$post = Post::create($data);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $post->createContent($ref_lang);
    	if (!empty($data['post_tag'])) {
        	$arrayTag = explode(',', $data['post_tag']);
	        foreach ($arrayTag as $key => $value) {
	        	$tagRecord = Tag::firstOrCreate([
				    'name' => trim($value),
				], [
				    'name' => trim($value),
				    'slug' => str_slug($value),
				]);

				$tagRecord->posts()->attach($post->getId());
	        }
        }
        if (!empty($request->input('category')) && is_array($request->input('category'))) {
            foreach ($request->input('category') as $key => $value) {
                $category = Category::find($value);
                if ($category) {
                    $category->posts()->attach($post->getId());
                } 
            }
        }
        DB::commit();
    	flash_success(trans('Create Post Successful'));
    	return redirect()->route('admin.post.get.list');
    }


    public function getEdit($id){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
    	$categories = Category::getContentAll($ref_lang)->get();
    	$post = Post::findById($id);
        $category = $post->categories()->get()->pluck('id')->toArray();
        $content = $post->getFirstLangCurrent($ref_lang);
    	return view('post::posts.edit',compact('categories','post','category','ref_lang','content'));
    }


    public function postEdit($id, EditRequest $request){
    	$data = $request->all();
        DB::beginTransaction();
        if (isset($data['language'])) {
            unset($data['language']);
        }
        if (isset($data['ref_lang'])) {
            unset($data['ref_lang']);
        }
    	$post = Post::findById($id);  
    	$data['start_display'] = Carbon::parse($data['start_display'])->format('Y-m-d H:i:s');
        $data['status'] = !empty($data['status']) ? $data['status'] : 0;
        $data['slug'] = !empty($data['slug']) ? str_slug($data['slug']) : str_slug($data['name']);
        $data['author_id'] = \Auth::guard()->user()->id;
        unset($data['category']);
    	$post->update($data);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $post->createContent($ref_lang);
    	if (!empty($data['post_tag'])) {
    		$post->tags()->detach();
        	$arrayTag = explode(',', $data['post_tag']);
	        foreach ($arrayTag as $key => $value) {
	        	$tagRecord = Tag::firstOrCreate([
				    'name' => trim($value),
				], [
				    'name' => trim($value),
				    'slug' => str_slug($value),
				]);

				$tagRecord->posts()->attach($post->getId());
	        }
        }
        if (!empty($request->input('category')) && is_array($request->input('category'))) {
            $post->categories()->detach();
            foreach ($request->input('category') as $key => $value) {
                $category = Category::find($value);
                if ($category) {
                    $category->posts()->attach($post->getId());
                } 
            }
        }
        DB::commit();
    	flash_success(trans('Update Post Successful'));
    	return redirect()->route('admin.post.get.edit',$id.'?ref_lang='.$ref_lang);
    }

    public function getDelete($id){
    	$post = Post::findById($id);
    	$post->delete();
    	flash_success(trans('Delete Post Successful'));
    	return redirect()->route('admin.post.get.list');
    }
}
