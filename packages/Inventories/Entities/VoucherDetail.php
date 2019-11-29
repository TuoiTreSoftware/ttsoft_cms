<?php

namespace TTSoft\Inventories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherDetail extends Model
{
	protected $table = 'doc_details';

	protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
    	return $this->id;
    }
    public function getTitle(){
        return $this->name;
    }

    /* get price*/
    public function getPrice(){
        return $this->price;
    }

    /* get gia_tri*/
    public function getGiaTri(){
        return $this->gia_tri;
    }

    /* get quantity*/
    public function getQuantity(){
        return $this->quantity;
    }

    /* get total value of each detail*/
    public function getTotalValue(){
        $data = $this->quantity * $this->gia_tri;
        return $data;
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

    public function product(){
        return $this->belongsTo(\TTSoft\Products\Entities\Product::class,'product_id','id');
    }

    public function pbds(){
        return $this->hasMany(\TTSoft\Sales\Entities\PBDS::class,'doc_detail_id','id');
    }
    public function get_color(){
        return $this->belongsTo(\TTSoft\Products\Entities\Attribute::class,'color','id');
    }
    public function get_size(){
        return $this->belongsTo(\TTSoft\Products\Entities\Attribute::class,'size','id');
    }
}
