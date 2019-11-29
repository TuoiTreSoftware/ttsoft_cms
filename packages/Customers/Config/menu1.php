<?php 

return [
	'name' => 'Khách hàng',
	'route' => '',
	'sort' => 3,
	'active' => 'customers',
	'icon' => 'icon-emotsmile',
	'middleware' => [],
	'group' => [
        'list' => [
            'name'  => 'Danh sách khách hàng',
            'icon'  => null,
            'route' => route('customer.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
	]
];