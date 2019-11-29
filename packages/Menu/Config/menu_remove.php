<?php 

return [
	'name' => trans('menu::menu.module_name'),
	'route' => route('admin.menu.get.list'),
	'sort' => 6,
	'active'=> 'menu',
	'icon' => 'icon-menu',
	'middleware' => [],
	'group' => []
];