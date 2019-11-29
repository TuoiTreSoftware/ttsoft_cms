<?php 
return [
	'name' => 'Bán hàng',
	'group' => [
		// permission sales;
        [
            'name' => 'sales-view',
            'display_name' => trans('Xem danh sách đơn hàng '),
        ],
        [
            'name' => 'sales-create',
            'display_name' => trans('Tạo đơn hàng '),
        ],
        [
            'name' => 'sales-edit',
            'display_name' => trans('Cập nhật đơn hàng '),
        ],
        [
            'name' => 'sales-delete',
            'display_name' => trans('Xóa đơn hàng '),
        ],
    ]
];