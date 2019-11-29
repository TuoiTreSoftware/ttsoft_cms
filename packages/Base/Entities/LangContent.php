<?php

namespace TTSoft\Base\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LangContent extends Model
{
	CONST CONTENT_TYPE_PRODUCT = 'product';

	CONST CONTENT_TYPE_POST = 'post';

	CONST CONTENT_TYPE_PAGE = 'page';

	CONST CONTENT_TYPE_POST_CATEGORY = 'post_category';

	CONST CONTENT_TYPE_PRODUCT_CATEGORY = 'product_category';

	CONST CONTENT_TYPE_HOME = 'home';

	protected $table = 'content_lang_fields';

	protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;
}
