<?php

namespace TTSoft\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    CONST DRIVE_YOU_TO_SUCCESS = 'DRIVE_YOU_TO_SUCCESS';

    CONST LOI_IT_CHUNG_TOI_MANG_DEN_CHO_BAN = 'LOI_IT_CHUNG_TOI_MANG_DEN_CHO_BAN';

    CONST SPACE_HCT = 'SPACE_HCT';

    CONST SPEAK_OF_HCT = 'SPEAK_OF_HCT';

	protected $table = 'abouts';

	protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
    	return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getURLKey(){
        return $this->slug;
    }
    /* format date */
    public function getCreatedAt(){
    	return $this->created_at->format("d/m/Y");
    }
    /* get all model */
    public static function findAll(){
    	$data = self::all();
    	return $data;
    }
    /* find by id model */
    public static function findById($id){
    	$data = self::find($id);
    	if (!$data) {
    		abort(404);
    	}
    	return $data;
    }

    public static function getPaginate($page = 10){
    	$data = self::orderBy("id","DESC")->paginate($page);
    	return $data;
    }

    public static function getFirstKey($key){
        $lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
        $data = About::where(['slug' => $key,'lang' => $lang])->first();
        return $data;
    }

    public function getImage(){
        return substr($this->image,1);
    }

    public function getSlug(){
        return $this->slug;
    }


    public function getMultiImageAttribute($value){
        return json_decode($value);
    }

}


