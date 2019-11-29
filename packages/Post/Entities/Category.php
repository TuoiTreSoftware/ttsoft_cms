<?php

namespace TTSoft\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Base\Entities\LangContent;
class Category extends Model
{
    use SoftDeletes;

	protected $table = 'post_categories';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;


    // get all record languages
    public static function getContentAll($ref_lang){
        $content = self::selectRaw("post_categories.id,content_lang_fields.title AS title,content_lang_fields.content AS content,content_lang_fields.lang,post_categories.created_at,post_categories.updated_at,post_categories.slug")
            ->join('content_lang_fields',function($join) use ($ref_lang){
                $join->on("post_categories.id","=","content_lang_fields.table_name")
                    ->where("content_lang_fields.content_type",LangContent::CONTENT_TYPE_POST_CATEGORY)
                    ->where("content_lang_fields.lang",$ref_lang);
            })
            ->latest("post_categories.created_at");
            return $content;
    }

    // get first record languages
    public function getFirstLangCurrent($lang){
        $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_POST_CATEGORY)
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
            $content->content_type = LangContent::CONTENT_TYPE_POST_CATEGORY;
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
        return $this->name;
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
    
    public function posts(){
        return $this->belongsToMany(Post::class,'category_post','category_id','post_id');
    }

    public function getRoute(){
        return route('web.news.getNewsSlug',$this->slug);
    }
}
