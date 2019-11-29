<?php 

return [
	'name' => trans('Sản phẩm'),
	'route' => '',
	'sort' => 5,
	'active'=> 'products',
	'icon' => 'icon-puzzle',
	'middleware' => [],
	'group' => [
        'list' => [
            'name'  => 'Sản phẩm',
            'icon'  => null,
            'route' => route('products.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'danh-muc-vat-tu' => [
            'name'  => trans('Danh mục'),
            'icon'  => null,
            'route' => route('product.categories.get.list'),
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ],
        'thuoc-tinh' => [
            'name'  => trans('Thuộc tính'),
            'icon'  => null,
            'route' => route('admin.attribute.get.list'),
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ],
        'the' => [
            'name'  => trans('Thẻ'),
            'icon'  => null,
            'route' => '#',
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ],
    ]
];