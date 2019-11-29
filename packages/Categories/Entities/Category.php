<?php

namespace TTSoft\Categories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /* Danh mục sử dụng chung cho toàn ứng dụng
    == Tables: Category
    == Prefix: Const
    */
    /*Prefix danh mục kho*/
    CONST WAREHOUSE = 'WAREHOUSE';
    /*Prefix danh mục ngan hang*/
    CONST BANK = 'BANK';

    /*Prefix danh mục tình trạng chứng từ*/
    CONST DOC_STATUS = 'DOC_STATUS';
    CONST DOC_STATUS_CLASS_COLOR = [
        12 => 'info',
        13 => 'success',
        14 => 'danger',
    ];

    /*Prefix danh mục kiểu vật tư*/
    CONST TYPE_OF_MATERIALS = 'TYPE_OF_MATERIALS';

    /*Prefix danh mục giới tính*/
    CONST SEX = 'SEX';

    /*Prefix danh mục chức vụ*/
    CONST POSITION = 'POSITION';

    /*Prefix danh mục trình độ học vấn*/
    CONST EDUCATION = 'EDUCATION';

    /*PRODUCT_TYPE = VẬT TƯ, HÀNG HÓA, DỊCH VỤ*/
    CONST VATTU = 15;
    CONST HANGHOA = 16;
    CONST DICHVU = 17;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public $timestamps = true;

    /* get ID*/
    public function getId(){
    	return $this->id;
    }
    public function getTitle(){
        return $this->name;
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

}
