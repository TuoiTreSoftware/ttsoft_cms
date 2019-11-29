<?php

namespace TTSoft\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{

    protected $table = 'settings';

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
}
