<?php

namespace TTSoft\Documents\Entities;

use Illuminate\Database\Eloquent\Model;
use TTSoft\Base\Entities\LangContent;
use TTSoft\Documents\Entities\DocumentMenu;
use TTSoft\Documents\Entities\DocumentVersion;
class Document extends Model
{

    protected $table = 'documents';

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

    public function version()
    {
        return $this->belongsTo(DocumentVersion::class,'version_id','id');
    }

   /*Get parrent menus*/
    public function getParentMenu($data_href){
        $data = DocumentMenu::where('data_href',$data_href)->first();
        if($data){
            $parent = DocumentMenu::find($data->parent_id);
            if($parent){
                return $parent->data_href;
            }    
        }
        $data = "";
        return $data;
    }
}
