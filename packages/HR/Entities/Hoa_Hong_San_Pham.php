<?php

namespace TTSoft\HR\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hoa_Hong_San_Pham extends Model
{

	protected $table = 'hoa_hong_san_pham';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
    	return $this->id;
    }
    public function getTitle(){
        return $this->first_name." ".$this->last_name;
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
    public function product_cate(){
        return $this->belongsTo(\TTSoft\Products\Entities\ProductCate::class,'product_cate_id','id');
    }
    public function product_cate_title(){
        $title = $this->product_cate()->first();
        return $title ? $title->getTitle() : null;
    }
    
}
