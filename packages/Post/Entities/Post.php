<?php

namespace TTSoft\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Base\Entities\LangContent;
class Post extends Model
{
    use SoftDeletes;


    CONST TUYEN_DUNG_ID = 9;

    CONST TIN_TUC_ID = 15;

    //ID tạm thời, chờ chốt danh mục tin sẽ lấy nội dung hiển thị trang Không Gian để thay thế lại
    CONST TIN_KHONG_GIAN = 16;

    //Tin Nổi bật
    CONST TIN_NOI_BAT = 19;

    CONST KHONG_GIAN_CHIA_SE = 16;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;


    // get all record languages
    public static function getContentAll($ref_lang){
        $content = self::selectRaw("posts.id,content_lang_fields.title AS title,content_lang_fields.content AS content,content_lang_fields.lang,posts.image,posts.number_view,posts.post_tag,posts.status,posts.meta_title,posts.meta_keywords,posts.meta_description,posts.created_at,posts.updated_at,posts.category_id,posts.slug,posts.sort_order,posts.start_display")
            ->join('content_lang_fields',function($join) use ($ref_lang){
                $join->on("posts.id","=","content_lang_fields.table_name")
                    ->where("content_lang_fields.content_type",LangContent::CONTENT_TYPE_POST)
                    ->where("content_lang_fields.lang",$ref_lang);
            })
            ->latest("posts.created_at");
            return $content;
    }

    // get first record languages
    public function getFirstLangCurrent($lang){
        $content = LangContent::where('content_type',LangContent::CONTENT_TYPE_POST)
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
            $content->content_type = LangContent::CONTENT_TYPE_POST;
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

    /* get Tit*/
    public function getName(){
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

    public function categories(){
        return $this->belongsToMany(Category::class,'category_post','post_id','category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDescription(){
        return $this->meta_description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getCategoryTitle(){
        $cate = $this->categories()->get();
        $title = null;
        $prefix = '';
        if ($cate) {
            foreach ($cate as $key => $value) {
                if ($key > 0) {
                    $prefix = ' - ';
                }
                $title.= '<a href="'.$value->getRoute().'"> '.$prefix.$value->getTitle().'</a> ';
            }
        }
        
        return $title;
    }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function getRoute(){
        return route('frontend.news.detail.get',[$this->slug , $this->id]);
    }
    
    public function getStart_display(){
        return $this->start_display;
    }
}
