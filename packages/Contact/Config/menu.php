<?php 

return [
	'name' => trans('contact::contact.module_name'),
	'sort' => 7,
	'route' => route('admin.contact.get.index'),
	'active' => 'contact',
	'icon' => 'icon-envelope-open',
	'middleware' => [],
	'group' => []
];