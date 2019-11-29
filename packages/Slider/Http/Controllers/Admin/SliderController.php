<?php

namespace TTSoft\Slider\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Slider\Repositories\Eloquent\EloquentSliderRepository;
use Illuminate\Support\Facades\Auth;
use TTSoft\Slider\Entities\Slider;
use File;
class SliderController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentSliderRepository $repository){
		$this->repository = $repository;
	}


    public function getList($category , Request $request){
        $sliders = Slider::where('category',$category)->paginate(env('PAGINATE_PAGER'));
        return view('slider::slider.list',compact('sliders'));
    }

    public function getCreate(){
        return view('slider::slider.create');
    }

    public function postCreate(Request $request){
    	$data = $request->all();
    	if($request->hasFile('image')){
            $image      = $request->file('image');
            $fileName   = str_slug($data['title']).date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/sliders/';
            $image->move($destinationPath, $fileName);
            $data['image'] = $destinationPath.$fileName;
        }  
    	Slider::create($data);
    	flash_info(trans('Add slider successfully.'));
    	return redirect()->route('admin.slider.get.list',$data['category']);
    }

    public function getEdit($id){
    	$slider = Slider::findById($id);
        return view('slider::slider.edit',compact('slider'));
    }

    public function postEdit($id,Request $request){
    	$slider = Slider::findById($id);
    	$data = $request->all();
    	if($request->hasFile('image')){
            if (File::exists($slider->getImage())) {
                File::delete($slider->getImage());
            }
            $image      = $request->file('image');
            $fileName   = str_slug($data['title']).date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/sliders/';
            $image->move($destinationPath, $fileName);
            $data['image'] = $destinationPath.$fileName;
        }  
    	$slider->update($data);
    	flash_info(trans('Update slider successfully.' . $slider->getTitle()));
    	return redirect()->route('admin.slider.get.list',$data['category']);
    }

    public function getDelete($id){
        $slider = Slider::findById($id);
        $category = $slider->category;
        $slider->delete();
        flash_info(trans('Delete slider successfully.' . $slider->getTitle()));
        return redirect()->route('admin.slider.get.list',$category);
    }
}
