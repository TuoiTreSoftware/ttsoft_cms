<?php

namespace TTSoft\About\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\About\Repositories\Eloquent\EloquentAboutRepository;
use TTSoft\About\Entities\About;
use File;
class AboutController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentAboutRepository $repository){
		$this->repository = $repository;
	}


    public function getList(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        $about = About::where('slug','about')->where('lang',$ref_lang)->first();
        return view('about::about.list',compact('about','ref_lang'));
    }

    public function postEdit(Request $request){
        $about = About::where('slug','about')->where('lang',$request->lang)->first();
        $icon1 = ($about)? $about->multi_image : null;
        $data = $request->all();
        if($request->hasFile('icon1')){
            if($icon1):
                if (File::exists($icon1[0]->icon)) {
                    File::delete($icon1[0]->icon);
                }
            endif;
            $image      = $request->file('icon1');
            $fileName   = 'icon1.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/abouts/';
            $image->move($destinationPath, $fileName);
            $data['icon1'] = $destinationPath.$fileName;
        }
        else{
            if($icon1){
               $data['icon1'] = $icon1[0]->icon;
            }
            else{
                $data['icon1'] = '';
            }
            
        }
        if($request->hasFile('icon2')){
            if($icon1):
                if (File::exists($icon1[1]->icon)) {
                    File::delete($icon1[1]->icon);
                }
            endif;
            $image      = $request->file('icon2');
            $fileName   = 'icon2.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/abouts/';
            $image->move($destinationPath, $fileName);
            $data['icon2'] = $destinationPath.$fileName;
        }
        else{
            if($icon1){
               $data['icon2'] = $icon1[1]->icon;
            }
            else{
                $data['icon2'] = '';
            }
            
        }
        if($request->hasFile('icon3')){
            if($icon1):
                if (File::exists($icon1[2]->icon)) {
                    File::delete($icon1[2]->icon);
                }
            endif;
            $image      = $request->file('icon3');
            $fileName   = 'icon3.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/abouts/';
            $image->move($destinationPath, $fileName);
            $data['icon3'] = $destinationPath.$fileName;
        }else{
            if($icon1){
               $data['icon3'] = $icon1[2]->icon;
            }
            else{
                $data['icon3'] = '';
            }
            
        }
        $multi_image = [
            [
                'title' => $data['title1'],
                'content' => $data['conten1'],
                'icon' => $data['icon1'],
            ],
            [
                'title' => $data['title2'],
                'content' => $data['conten2'],
                'icon' => $data['icon2'],
            ],
            [
                'title' => $data['title3'],
                'content' => $data['conten3'],
                'icon' => $data['icon3'],
            ],
        ];
        $formData = [
            'title' => $data['title'],
            'slug' => 'about',
            'video' => $data['video'],
            'slogan' => $data['slogan'],
            'lang' => $request->lang,
            'multi_image' => json_encode($multi_image),
        ];
        if ($about) {
            About::where('slug','about')
                ->where('lang',$request->lang)
                ->update($formData);
        }
        else{
            About::create($formData);
        }
        flash_info(trans('Update About successfully.'));
        return redirect()->back();
    }
}
