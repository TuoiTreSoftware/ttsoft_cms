<?php 

return [
	'name' => trans('frontend::admin_trans.name'),
	'route' => "",
	'sort' => 4,
	'active'=> 'home',
	'icon' => 'icon-screen-desktop',
	'middleware' => [],
	'group' => [
		'menu' => [
			'name'  => trans('menu::menu.module_name'),
			'icon'  => null,
			'route' => route('admin.menu.get.list'),
			'active'=> 'menu',
			'middleware' => [],
		],
		'quan_ly_trang' => [
			'name'  => trans('frontend::admin_trans.manage_page'),
			'icon'  => null,
			'route' => route('admin.page.get.list'),
			'active'=> 'quan_ly_trang',
			'middleware' => [],
		],
	],
];