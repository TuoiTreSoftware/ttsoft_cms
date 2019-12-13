<?php 

return [
	'name' => trans('Customers::customer.module_name'),
	'route' => '',
	'sort' => 3,
	'active' => 'customers',
	'icon' => 'icon-emotsmile',
	'middleware' => [],
	'group' => [
        'list' => [
            'name'  => trans('Customers::customer.customer_list'),
            'icon'  => null,
            'route' => route('customer.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'create' => [
            'name'  => trans('Customers::customer.create'),
            'icon'  => null,
            'route' => route('customer.get.create'),
            'active'=> 'posts',
            'middleware' => [],
        ],
	]
];