<?php 

return [
	'name' => trans('product::product.module_name'),
	'route' => '',
	'sort' => 5,
	'active'=> 'products',
	'icon' => 'icon-puzzle',
	'middleware' => [],
	'group' => [
        'list' => [
            'name'  => trans('product::product.module_name'),
            'icon'  => null,
            'route' => route('products.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'danh-muc-vat-tu' => [
            'name'  => trans('product::product.category_table'),
            'icon'  => null,
            'route' => route('product.categories.get.list'),
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ],
        'thuoc-tinh' => [
            'name'  => trans('product::product.attribute'),
            'icon'  => null,
            'route' => route('admin.attribute.get.list'),
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ]
    ]
];