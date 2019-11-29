<?php

namespace TTSoft\Setting\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use TTSoft\Setting\Repositories\Eloquent\EloquentSettingRepository;
use TTSoft\Setting\Entities\Setting;
use Illuminate\Support\Facades\DB;
use File;
class SettingController extends Controller
{
	/**
	 *
	 * @return attribute for user
	 *
	 */
	protected $repository;

	public function __construct(EloquentSettingRepository $repository){
		$this->repository = $repository;
	}


    public function index(Request $request){
        $ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
        return view('setting::setting.index',compact('ref_lang'));
    }

    public function getEdit(Request $request){
    	$data = $request->all();
    	DB::beginTransaction();
    	if($request->hasFile('banner')){
    		if (File::exists(get_config('banner'))) {
                File::delete(get_config('banner'));
            }
            $image      = $request->file('banner');
            $fileName   = 'banner'.date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/images/settings/';
            $image->move($destinationPath, $fileName);
            $data['banner'] = $destinationPath.$fileName;
        }
        if($request->hasFile('logo')){
        	if (File::exists(get_config('logo'))) {
                File::delete(get_config('logo'));
            }
            $image      = $request->file('logo');
            $fileName   = 'logo'.date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/images/settings/';
            $image->move($destinationPath, $fileName);
            $data['logo'] = $destinationPath.$fileName;
        }
        if($request->hasFile('fav')){
            if (File::exists(get_config('fav'))) {
                File::delete(get_config('fav'));
            }
            $image      = $request->file('fav');
            $fileName   = 'fav'.date('Y-m-d').'.'.$image->getClientOriginalExtension(); 
            $destinationPath =   './uploads/images/settings/';
            $image->move($destinationPath, $fileName);
            $data['fav'] = $destinationPath.$fileName;
        }
        unset($data['_token']);
        foreach ($data as $key => $value) {
        	$setting = Setting::where('key',$key)->where('lang',$request->lang);
        	if ($setting->first()) {
        		$setting->update([
				    'key' => trim($key),
				    'value' => !empty($value) ? $value : ' ',
                    'lang' => $request->lang,
				]);
        	}else{
        		Setting::create([
				    'key' => trim($key),
				    'value' => !empty($value) ? $value : ' ',
                    'lang' => $request->lang,
				]);
        	}
        }
    	DB::commit();
    	flash_success(trans('Update Config Successful'));
    	return redirect()->route('admin.setting.get.index','ref_lang='.$request->lang);
    }
}
