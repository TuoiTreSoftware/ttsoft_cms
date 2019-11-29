<?php

namespace TTSoft\Promotions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{

    const KHUYEN_MAI_THEO_GIA_TIEN = 1;

    const KHUYEN_MAI_THEO_PHAN_TRAM = 2;


	protected $table = 'discounts';

	protected $primaryKey = 'id';
    
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

    public function courses(){
        return $this->belongsTo(Courses::class,'course_id','id');
    }


    public function class_room(){
        return $this->belongsTo(ClassRoom::class,'course_class_id','id');
    }

    public function getTitle(){
        return $this->name;
    }

    public function getCode(){
        return $this->code;
    }

    public function getDiscountOnline(){
        return ($this->online === 1) ? "Online Only" : "";
    }

    public function getCoursesTitle(){
        $data = $this->courses()->first();
        if ($data) {
            return $data->getTitle();
        }
        return null;
    }
     public function getClassRoomTitle(){
        $data = $this->class_room()->first();
        if ($data) {
            return $data->getTitle();
        }
        return null;
    }
}
