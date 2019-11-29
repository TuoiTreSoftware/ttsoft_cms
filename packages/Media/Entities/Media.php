<?php

namespace TTSoft\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

	protected $table = 'medias';

	protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;

    CONST SECTION_1 = 'SECTION_1';
    CONST SECTION_2 = 'SECTION_2';
    CONST SECTION_3 = 'SECTION_3';
    CONST SECTION_4 = 'SECTION_4';
    CONST SECTION_5 = 'SECTION_5';
    CONST SECTION_6 = 'SECTION_6';
    CONST SECTION_7 = 'SECTION_7';
    CONST SECTION_8 = 'SECTION_8';

    CONST CATEGORY_TITLE = [
        self::SECTION_8 => 'Logo đối tác',
    ];

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

    public function getUrl(){
        return $this->url;
    }

    public function getContent(){
        return $this->content;
    }

    public function getImage(){
        return $this->image;
    }

    public function getStatus(){
        return $this->status == 1? TRUE : FALSE;
    }

    public function getCategory(){
        return self::CATEGORY_TITLE[$this->category];
    }
}
