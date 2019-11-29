<?php

namespace TTSoft\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TTSoft\Inventories\Entities\Voucher;
class PBDS extends Model
{
    // đơn hàng bán model
    
    CONST DOANH_SO_TU_VAN = 1;

    CONST DOANH_SO_TUA = 2;

    protected $table = 'phan_bo_doanh_so';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
        return $this->id;
    }

    /* get all model */
    public static function findAll(){
        $data = self::where('prefix',self::PREFIX)->orderBy('id','DESC')->get();
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
        $data = self::where('prefix',self::PREFIX)->orderBy("id","DESC")->paginate($page);
        return $data;
    }

    public function staff(){
        return $this->belongsTo(\TTSoft\HR\Entities\Staffs::class,'staff_id','id');
    }
}
