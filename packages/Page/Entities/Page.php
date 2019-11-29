<?php

namespace TTSoft\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Base\Entities\LangContent;
class Page extends Model
{
    use SoftDeletes;

	protected $table = 'pages';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;

    // get all record languages
    public static function getContentAll($ref_lang){
        $content = self::selectRaw("pages.id,content_lang_fields.title AS title,content_lang_fields.content AS content,content_lang_fields.lang,pages.image,pages.content,pages.slug,pages.sort_order,pages.status,pages.meta_title,pages.meta_keyworks,pages.meta_description,pages.created_at,pages.updated_at")
            ->join('content_lang_fields',function($join) use ($ref_lang){
                $join->on("pages.id","=","content_lang_fields.table_name")
                    ->where("content_lang_fields.content_type",LangContent::CONTENT_TYPE_PAGE)
                    ->where("content_lang_fields.lang",$ref_lang);
            })
            ->latest("pages.created_at");
            return $content;
    }

    // get first record languages
    public function getFirstLangCurrent($lang){
        $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_PAGE)
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
            $content->title = request()->input('name');
            $content->content = request()->input('content');
            $content->save();
        }
        else
        {
            $content = new LangContent;
            $content->title = request()->input('name');
            $content->content = request()->input('content');
            $content->content_type = LangContent::CONTENT_TYPE_PAGE;
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


    public function getTitle(){
        return $this->name;
    }

    public function getContent(){
        return $this->content;
    }

    public function getImage(){
        return $this->image;
    }

    public function getRoute(){
        return route('frontend.page.detail.get',[$this->slug , $this->id]);
    }
}
