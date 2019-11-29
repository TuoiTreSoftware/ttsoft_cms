<?php

namespace TTSoft\Slider\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    CONST CATEGORY_HOME = 'home';
    CONST CATEGORY_ABOUT = 'contact';
    CONST CATEGORY_COURSES = 'courses';
    CONST CATEGORY_KHONGGIAN = 'khonggian';

    CONST CATEGORY = [
        self::CATEGORY_HOME => 'Home Slider',
        self::CATEGORY_ABOUT => 'Giới thiệu Slider',
        self::CATEGORY_COURSES => 'Đào tạo Slider',
        self::CATEGORY_KHONGGIAN => 'Không gian Slider',
    ];
	protected $table = 'sliders';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;

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
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getImage(){
        return $this->image;
    }

    public function getUrl(){
        return $this->URL;
    }

    public function getCategory(){
        return self::CATEGORY[$this->category];
    }
}
