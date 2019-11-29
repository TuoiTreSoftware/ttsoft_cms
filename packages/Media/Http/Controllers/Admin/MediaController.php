<?php

namespace TTSoft\Media\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Media\Repositories\Eloquent\EloquentMediaRepository;
use Illuminate\Support\Facades\Auth;
use TTSoft\Media\Entities\Media;
use TTSoft\Home\Entities\Home;
use File;
use TTSoft\Base\Entities\LangContent;
class MediaController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentMediaRepository $repository){
		$this->repository = $repository;
	}

    public function getList(Request $request){
        $medias = Media::orderBy('id','DESC')->paginate(env('PAGINATE_PAGER'));
        return view('media::media.list',compact('medias'));
    }

    public function getListCategory($category = null , Request $request){
        $homeContent = Home::where(['slug' => $category])->first();
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $home = Home::getContentAll($ref_lang)->where(['slug' => $category])->first();
        if ($home) {
            $medias = Media::where('category',$category)->paginate(env('PAGINATE_PAGER'));
            return view('media::media.list',compact('medias','category','home','ref_lang'));
        }
        else
        {
            $content = new LangContent;
            $content->title = '-';
            $content->content = '-';
            $content->content_type = LangContent::CONTENT_TYPE_HOME;
            $content->table_name = $homeContent->id;
            $content->json_content = "-";
            $content->lang = $ref_lang;
            $content->save();
            $home = Home::getContentAll($ref_lang)->where(['slug' => $category])->first();
            $medias = Media::where('category',$category)->paginate(env('PAGINATE_PAGER'));
            return view('media::media.list',compact('medias','category','home','ref_lang'));
        }
        
    }

    public function getCreate(){
        return view('media::media.create');
    }

    public function postCreate(Request $request){
    	$data = $request->all();
    	$data['slug'] = str_slug($data['title']);
    	if($request->hasFile('image')){
            $image      = $request->file('image');
            $fileName   = str_slug($data['title']).date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/medias/';
            $image->move($destinationPath, $fileName);
            $data['image'] = $destinationPath.$fileName;
        } 
        $data['status'] = isset($data['status']) ? $data['status'] : 0;
        Media::create($data);
        flash_info(trans('Add page successfully.'));
        return redirect()->route('admin.home.get.index');
    }

    public function getEdit($id){
    	$media = Media::findById($id);
        return view('media::media.edit',compact('media'));
    }

    public function postEdit($id,Request $request){
    	$media = Media::findById($id);
    	$data = $request->all();
    	$data['slug'] = str_slug($data['title']);
    	if($request->hasFile('image')){
            if (File::exists($media->getImage())) {
                File::delete($media->getImage());
            }
            $image      = $request->file('image');
            $fileName   = str_slug($data['title']).date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/medias/';
            $image->move($destinationPath, $fileName);
            $data['image'] = $destinationPath.$fileName;
        }  
        $data['status'] = isset($data['status']) ? $data['status'] : 0;
        $media->update($data);
        flash_info(trans('Update media successfully.' . $media->getTitle()));
        return redirect()->route('admin.home.get.index');
    }

    public function getDelete($id){
        $media = Media::findById($id);
        $category = $media->category;
        flash_info(trans('Delete media successfully. ' . $media->getTitle()));
        $media->delete();
        return redirect()->route('admin.home.get.index');
    }

    public function postHomeUpdate($category , \TTSoft\Media\Http\Requests\Admin\UpdateHomeRequest $request){
        // $content = response()->json([
        //     'category' => $request->category,
        //     'limit' => $request->limit,
        // ]);
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $arrayName = array('category' => $request->category,'limit' => $request->limit );
        
        $home = Home::getContentAll($ref_lang)->where(['slug' => $category])->first();
        if ($home) {
            Home::where(['slug' => $category])->update(['title' => $request->title , 'slogan' => $request->slogan , 'slug' => $category,'content'=>json_encode($arrayName)]);
        }else{
            $home = Home::create(['title' => $request->title , 'slogan' => $request->slogan , 'slug' => $category]);
        }

        $home->createContent($ref_lang);
        flash_info(trans('Update successfully'));
        return redirect()->route('admin.home.get.index');
    }
}
