<?php 

return [
	'name' => trans('frontend::admin_trans.name'),
	'route' => "",
	'sort' => 4,
	'active'=> 'home',
	'icon' => 'icon-screen-desktop',
	'middleware' => [],
	'group' => [
		'trang_chu' => [
			'name'  => trans('frontend::admin_trans.dashboard'),
			'icon'  => null,
			'route' => route('admin.home.get.index'),
			'active'=> 'trang_chu',
			'middleware' => [],
		],
		'menu' => [
			'name'  => trans('menu::menu.module_name'),
			'icon'  => null,
			'route' => route('admin.menu.get.list'),
			'active'=> 'menu',
			'middleware' => [],
		],
		'gioi_thieu' => [
			'name'  => trans('frontend::admin_trans.about_us'),
			'icon'  => null,
			'route' => route('admin.about.get.list'),
			'active'=> 'gioi_thieu',
			'middleware' => [],
		],
		'quan_ly_trang' => [
			'name'  => trans('frontend::admin_trans.manage_page'),
			'icon'  => null,
			'route' => route('admin.page.get.list'),
			'active'=> 'quan_ly_trang',
			'middleware' => [],
		],
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
	],
];