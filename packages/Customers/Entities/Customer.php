<?php

namespace TTSoft\Customers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Customer extends Model
{

	protected $table = 'customers';

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

    /* @return full name for user */
    public function getFullNameAttribute(){
        return $this->attributes['first_name'] . ' '. $this->attributes['last_name'];
    }

    /* @return Province Name for user */

    public function getProvinceName(){
        $province = DB::table('provinces')->where('id',$this->provinces)->first();
        return $province->name;
    }
    
    /* format date */
    public function getCreatedAt(){
    	return $this->created_at->format("d/m/Y");
    }
    /* get all model */
    public static function findAll(){
    	$data = self::orderBy('id','DESC')->get();
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
        return $this->hasMany(Post::class,'category_id','id');
    }

    public function getRoute(){
        return route('frontend.tintuc.get',$this->slug);
    }
    

    public function getPhoneNumber(){
        return $this->phone_numer;
    }
}
