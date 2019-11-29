<?php 

return [
	'name' => trans('sales::sales.name'),
	'route' => '',
	'sort' => 2,
	'active' => 'sales',
	'icon' => 'icon-handbag',
	'middleware' => [],
	'group' => [
        'don_hang' => [
            'name'  => 'Đơn hàng',
            'icon'  => '',
            'route' => route('sales.don_hang_ban.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        // 'don_hang_dutoan' => [
        //     'name'  => 'Đơn hàng dự toán',
        //     'icon'  => '',
        //     'route' => route('sales.dutoan.get.list'),
        //     'active'=> 'posts',
        //     'middleware' => [],
        // ],
        // 'thamso_dutoan' => [
        //     'name'  => 'Tham số dự toán',
        //     'icon'  => '',
        //     'route' => route('sales.dutoan.get.tham-so'),
        //     'active'=> 'thamso_dutoan',
        //     'middleware' => [],
        // ],
        'list-khachang' => [
            'name'  => 'Danh sách khách hàng',
            'icon'  => null,
            'route' => route('customer.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ]
	]
];