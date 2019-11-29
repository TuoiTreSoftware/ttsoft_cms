<?php 

return [
	'name' => trans('categories::categories.name'),
	'route' => '',
	'sort' => 5,
	'active'=> 'categories',
	'icon' => 'icon-menu',
	'middleware' => [],
	'group' => [
		'vat_tu' => [
            'name'  => trans('Vật tư - hàng hóa'),
            'icon'  => null,
            'route' => route('products.get.list'),
            'active'=> '',
            'middleware' => [],
        ],
        'danh-muc-vat-tu' => [
            'name'  => trans('Danh mục vật tư'),
            'icon'  => null,
            'route' => route('product.categories.get.list'),
            'active'=> 'danh-muc-vat-tu',
            'middleware' => [],
        ],
        // 'hang-san-xuat' => [
        //     'name'  => trans('Hãng sản xuất'),
        //     'icon'  => null,
        //     'route' => route('producer.get.list'),
        //     'active'=> 'hang-san-xuat',
        //     'middleware' => [],
        // ],
        \TTSoft\Categories\Entities\Category::DOC_STATUS => [
            'name'  => trans('Tình trạng chứng từ'),
            'icon'  => null,
            'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::DOC_STATUS),
            'active'=> 'DOC_STATUS',
            'middleware' => [],
        ],
        \TTSoft\Categories\Entities\Category::TYPE_OF_MATERIALS => [
            'name'  => trans('Kiểu vật tư'),
            'icon'  => null,
            'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::TYPE_OF_MATERIALS),
            'active'=> 'TYPE_OF_MATERIALS',
            'middleware' => [],
        ],
        \TTSoft\Categories\Entities\Category::BANK => [
            'name'  => trans('Ngân Hàng'),
            'icon'  => null,
            'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::BANK),
            'active'=> 'BANK',
            'middleware' => [],
        ],
	]
];