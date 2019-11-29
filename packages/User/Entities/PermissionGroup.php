<?php

namespace TTSoft\User\Entities;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table ='permission_group';

	protected $guarded = [];
	
	public $timestamps = false;
}
