<?php

namespace TTSoft\Inventories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PXK extends Voucher
{
	//Phiếu xuất kho

    CONST PREFIX = 'PXK';

    protected $attributes = [
        'prefix' => self::PREFIX
    ];

    /* get all model */
    public static function findAll(){
    	$data = self::where('prefix',self::PREFIX)->whereNull('deleted_at')->orderBy('id','DESC')->get();
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


    public function createDocs($data){
        $data['prefix'] = self::PREFIX;
        $docs = self::create($data);
        if ($docs) {
            return $docs;
        }
        return null;
    }

    public function getDocHeadersTitle(){
        $cate = $this->doc_details()->first();
        return $cate ? $cate->getTitle() : null;
    }

    public function setPrefixAttribute(){
       $this->attributes['prefix'] = self::PREFIX;
    }
}
