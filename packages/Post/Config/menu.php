<?php 

return [
	'name' => trans('post::post.module_name'),
	'route' => '',
	'sort' => 4,
	'active'=> 'post',
	'icon' => ' icon-note',
	'middleware' => [],
	'group' => [
        'quan_ly_bai_viet' => [
            'name'  => trans('frontend::admin_trans.manage_post'),
            'icon'  => null,
            'route' => route('admin.post.get.list'),
            'active'=> 'quan_ly_bai_viet',
            'middleware' => [],
        ],
        'danh_muc_bai_viet' => [
            'name'  => trans('frontend::admin_trans.manage_cate'),
            'icon'  => null,
            'route' => route('admin.post-categories.get.list'),
            'active'=> 'danh_muc_bai_viet',
            'middleware' => [],
        ]
	]
];