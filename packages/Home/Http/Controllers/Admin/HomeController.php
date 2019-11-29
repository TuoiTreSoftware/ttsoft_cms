<?php

namespace TTSoft\Home\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Home\Repositories\Eloquent\EloquentHomeRepository;
use TTSoft\Home\Entities\Home;
use TTSoft\Media\Entities\Media;
use File;
class HomeController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentHomeRepository $repository){
		$this->repository = $repository;
	}

    public function getIndexHome(){
        return view('home::home.home_index');
    }

    public function getList(Request $request){
    	$homes = $this->repository->findAll();
        return view('home::home.list',compact('homes'));
    }


    public function getEdit($key, Request $request){
    	$data = Home::getFirstKey($key);
    	if (!$data) {
            abort(404);
        }
        return view('home::home.form.'.$data->getURLKey(),compact('data'));
    }

    public function postEdit($key, Request $request){
        $data = $request->all();
        $home = Home::getFirstKey($key);
        if (!$home) {
            abort(404);
        }
        switch ($home->getURLKey()) {
            case Home::DRIVE_YOU_TO_SUCCESS:
                if($request->hasFile('image')){
                    if (File::exists($home->getImage())) {
                        File::delete($home->getImage());
                    }
                    $image      = $request->file('image');
                    $fileName   = str_slug($data['title']).date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
                    $destinationPath =   './uploads/homes/';
                    $image->move($destinationPath, $fileName);
                    $data['image'] = $destinationPath.$fileName;
                }  
                $home->update($data);
                break;
            case Home::LOI_IT_CHUNG_TOI_MANG_DEN_CHO_BAN:
                // code
                break;
            case Home::SPACE_HCT:
                //code
                break;
            case Home::SPEAK_OF_HCT:
                //code
                break;
            default:
        }
        flash_info(trans('Update '.$home->getTitle().' successfully.'));
        return redirect()->route('admin.home.get.list');
    }

    public function getView($id){
        $page = Home::findById($id);
        dd($page);
    }

}
