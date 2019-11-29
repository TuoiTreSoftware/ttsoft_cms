<?php 

return [
	'name' => trans('setting::setting.module_name'),
	'sort' => 24,
	'route' => '',
	'active' => 'setting',
	'icon' => 'icon-settings',
	'middleware' => [],
	'group' => [
		//Khai báo chương trình đào tạo gồm các thông tin cơ bản
		'config' => [
            'name'  => trans('setting::setting.module_name'),
            'icon'  => null,
            'route' => route('admin.setting.get.index'),
            'active'=> 'config',
            'middleware' => [],
        ],
	]
];