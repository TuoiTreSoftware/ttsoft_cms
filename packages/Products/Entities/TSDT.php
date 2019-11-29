<?php

namespace TTSoft\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TSDT extends Model
{

	protected $table = 'tham_so_du_toan';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;


    CONST TYPE = [
        1 => 'Tham số chung',
        2 => 'Hệ số mái nhà',
        3 => 'Hệ số mặt tiền nhà',
        4 => 'Hệ số góc nghiêng mái nhà',
        5 => 'Hệ số mức độ hệ thống',
    ];

    /* get ID*/
    public function getId(){
    	return $this->id;
    }

    public function getTitle(){
        return $this->name;
    }

    public function getTitleToNumber(){
        $number = $this->name;
        return (int)$number;
    }

    public function getValue(){
        return $this->value;
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
}



