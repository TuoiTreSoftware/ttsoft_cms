<?php

namespace TTSoft\Documents\Entities;

use Illuminate\Database\Eloquent\Model;
use TTSoft\Base\Entities\LangContent;

class DocumentMenu extends Model
{

	protected $table = 'documents_menu';

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
    /*Get menu title by Id*/
    public function getTitleById($id){
        $data = self::find($id);
        if ($data) {
            return $data->title;
        }
        return $id;   
    }
    /*Get child menus*/
    public function getChildMenu($id){
        $data = self::where('parent_id',$id)->get();
        return $data;
    }

    /*Get parent menus*/
    public function getParentMenu($data_href){
        $data = self::where('data_href',$data_href)->first();
        if($data){
            $parent = self::find($data->parent_id);
            if($parent){
                return $parent->data_href;
            }    
        }
        $data = "";
        return $data;
    }

    /*Get document*/
    public function getDocument(){
        $data = Document::where('data_href_menu',$this->data_href)->first();
        return $data;
    }
}
