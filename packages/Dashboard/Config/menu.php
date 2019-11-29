<?php 

return [
	'name' => trans('Dashboard'),
	'route' => route('admin.dashboard.get.index'),
	'sort' => 1,
	'active'=> 'home',
	'icon' => 'icon-speedometer',
	'middleware' => [],
	'group' => [
	],
];