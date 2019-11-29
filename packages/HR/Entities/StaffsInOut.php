<?php

namespace TTSoft\HR\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffsInOut extends Model
{

	protected $table = 'staffs_in_out';

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

    public function getRoute(){
        return route('frontend.tintuc.get',$this->slug);
    }

    public function staff(){
        return $this->belongsTo(Staffs::class,'staffs_id','id');
    }
    public function staff_title(){
        $title = $this->staff()->first();
        return $title ? $title->getTitle() : null;
    }
}
