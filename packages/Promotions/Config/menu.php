<?php 

return [
	'name' => 'Khuyến mãi',
	'route' => '',
	'sort' => 3,
	'active' => 'khuyen-mai',
	'icon' => 'icon-present',
	'middleware' => [],
	'group' => [
        'chuong_trinh_khuyen_mai' => [
            'name'  => 'Chương trình khuyến mãi',
            'icon'  => null,
            'route' => route('admin.promotions.get.list'),
            'active'=> 'khuyen mãi',
            'middleware' => [],
        ]
	]
];