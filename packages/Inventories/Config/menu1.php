<?php 

return [
	'name' => 'Kho hàng',
	'route' => '',
	'sort' => 5,
	'active'=> 'inventories',
	'icon' => 'icon-drawar',
	'middleware' => [],
	'group' => [
        'ql_kho' => [
            'name'  => 'Quản lý kho',
            'icon'  => null,
            'route' => '#',
            /**
             *
             * @class \TTSoft\Categories\Http\Controllers\Admin\AdminController
             * @action function getList()
             *
             */
            'route' => route('categories.inventories.get.list'), 
            'active'=> 'ql_kho',
            'middleware' => [],
        ],
        'nhap_kho' => [
            'name'  => 'Phiếu nhập kho',
            'icon'  => null,
            'route' => route('inventories.nhap_kho.get.list'),
            'active'=> 'nhap_kho',
            'middleware' => [],
        ],
        'xuat_kho' => [
            'name'  => 'Phiếu xuất kho',
            'icon'  => null,
            'route' => route('inventories.xuat_kho.get.list'),
            'active'=> 'xuat_kho',
            'middleware' => [],
        ],
        'dieu_chuyen' => [
            'name'  => 'Phiếu điều chuyển kho',
            'icon'  => null,
            'route' => route('inventories.dieu_chuyen.get.list'),
            'active'=> 'dieu_chuyen',
            'middleware' => [],
        ],
        'kho_hang' => [
            'name'  => 'Kho hàng',
            'icon'  => null,
            'route' => '',
            'active'=> 'kho_hang',
            'middleware' => [],
        ],
        'bao_cao' => [
            'name'  => 'Báo cáo N-X-T',
            'icon'  => null,
            'route' => route('reports.nxt.getnxt'),
            'active'=> 'bao_cao',
            'middleware' => [],
        ],
    ]
];