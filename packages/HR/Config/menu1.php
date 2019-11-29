<?php 

return [
	'name' => 'Nhân sự',
	'route' => '',
	'sort' => 6,
	'active' => 'nhan_su',
	'icon' => 'icon-handbag',
	'middleware' => [],
	'group' => [
		'cham_cong' => [
            'name'  => 'Chấm công vào - ra',
            'icon'  => null,
            'route' => route('staffs_in_out.get.list'),
            'active'=> 'danh_sach_nhan_vien',
            'middleware' => [],
        ],
        'danh_sach_nhan_vien' => [
            'name'  => 'Danh sách nhân viên',
            'icon'  => null,
            'route' => route('staffs.get.list'),
            'active'=> 'danh_sach_nhan_vien',
            'middleware' => [],
        ],
        'hoa_hong_nhan_vien' => [
            'name'  => 'Hoa hồng nhân viên',
            'icon'  => null,
            'route' => route('commission.get.list'),
            'active'=> 'danh_sach_nhan_vien',
            'middleware' => [],
        ]
	]
];