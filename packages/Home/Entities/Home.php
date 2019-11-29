<?php

namespace TTSoft\Home\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Base\Entities\LangContent;

class Home extends Model
{
    CONST SECTION_1 = 'SECTION_1';
    CONST SECTION_2 = 'SECTION_2';
    CONST SECTION_3 = 'SECTION_3';
    CONST SECTION_4 = 'SECTION_4';
    CONST SECTION_5 = 'SECTION_5';
    CONST SECTION_6 = 'SECTION_6';
    CONST SECTION_7 = 'SECTION_7';
    CONST SECTION_8 = 'SECTION_8';
    
	protected $table = 'homes';

	protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;


    // get all record languages
    public static function getContentAll($ref_lang){
        $content = self::selectRaw("homes.id,content_lang_fields.title AS title,content_lang_fields.content AS content,content_lang_fields.lang,homes.slug,homes.image,homes.content,homes.slogan,homes.multi_image")
            ->join('content_lang_fields',function($join) use ($ref_lang){
                $join->on("homes.id","=","content_lang_fields.table_name")
                    ->where("content_lang_fields.content_type",LangContent::CONTENT_TYPE_HOME)
                    ->where("content_lang_fields.lang",$ref_lang);
            })
            ->latest("homes.created_at");
            return $content;
    }

    // get first record languages
    public function getFirstLangCurrent($lang){
        $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_HOME)
            ->where('table_name',$this->id)
            ->where('lang',$lang)
            ->latest("created_at")
            ->first();
        return $content;
    } 

    // create content 
    public function createContent($ref_lang){
        $content = $this->getFirstLangCurrent($ref_lang);
        if ($content !== null) {
            $content->title = request()->input('title');
            $content->content = request()->input('slogan');
            $content->save();
        }
        else
        {
            $content = new LangContent;
            $content->title = request()->input('title');
            $content->content = request()->input('slogan');
            $content->content_type = LangContent::CONTENT_TYPE_HOME;
            $content->table_name = $this->id;
            $content->json_content = "-";
            $content->lang = $ref_lang;
            $content->save();
        }
        return $content;
    }

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
        $data = Home::where(['slug' => $key])->first();
        return $data;
    }

    public function getImage(){
        return substr($this->image,1);
    }

    public function getSlug(){
        return $this->slug;
    }

}


