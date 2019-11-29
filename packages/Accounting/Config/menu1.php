<?php 

return [
	'name' => 'Kế toán',
	'route' => '',
	'sort' => 6,
	'active'=> 'accounting',
	'icon' => 'icon-layers',
	'middleware' => [],
	'group' => [
        'phieu_thu' => [
            'name'  => 'Phiếu thu',
            'icon'  => null,
            'route' => route('accounting.phieu_thu.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'bao_co_ngan_hang' => [
            'name'  => 'Báo có ngân hàng',
            'icon'  => null,
            'route' => route('accounting.bao_co.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'phieu_chi' => [
            'name'  => 'Phiếu chi',
            'icon'  => null,
            'route' => route('accounting.phieu_chi.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'bao_no_ngan_hang' => [
            'name'  => 'Ủy nhiệm chi',
            'icon'  => null,
            'route' => route('accounting.bao_no.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'so_quy_tien_mat' => [
            'name'  => 'Sổ quỹ tiền mặt',
            'icon'  => null,
            'route' => null,
            'active'=> 'posts',
            'middleware' => [],
        ],
        'so_quy_ngan_hang' => [
            'name'  => 'Sổ quỹ tiền gửi ngân hàng',
            'icon'  => null,
            'route' => null,
            'active'=> 'posts',
            'middleware' => [],
        ],
	]
];