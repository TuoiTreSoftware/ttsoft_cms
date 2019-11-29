<?php

namespace TTSoft\Inventories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

	protected $table = 'doc_headers';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;

     /* find by id model */
    public static function findById($id){
        $data = self::find($id);
        if (!$data) {
            abort(404);
        }
        return $data;
    }
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
    /* get quantity*/
    public function getQuantity(){
        return $this->quantity;
    }
    /* format date */
    public function getCreatedAt(){
    	return $this->created_at->format("d/m/Y");
    }

    public function doc_details(){
        return $this->hasMany(VoucherDetail::class,'doc_headers_id','id');
    }

    /* nhân viên */
    public function user(){
        return $this->belongsTo(\TTSoft\User\Entities\User::class,'user_id','id');
    }

    /* Khách hàng */

    public function customer(){
        return $this->belongsTo(\TTSoft\Customers\Entities\Customer::class,'customer_id','id');
    }

}
