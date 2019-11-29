<?php

namespace TTSoft\Base\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogActivity extends Model
{

	protected $table = 'log_activities';

	protected $primaryKey = 'id';

    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id'
    ];

    public $timestamps = true;
}
