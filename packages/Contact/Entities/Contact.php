<?php

namespace TTSoft\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

	protected $table = 'contacts';

	protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    
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
    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getContent(){
        return $this->content;
    }
}   

