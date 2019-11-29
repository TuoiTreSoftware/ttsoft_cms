<?php

namespace TTSoft\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    CONST COLOR_ID  = 1;
    
    CONST SIZE_ID   = 2;

	protected $table = 'product_attributes';

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

    public function products(){
        return $this->belongsToMany(Product::class,'product_tag_mapping','product_tag_id','product_id')
            ->withTimestamps('created_at', 'updated_at');
    }

    public function getRouteTag(){
        return $this->slug;
    }
    

    public function children(){
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}
