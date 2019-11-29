<?php 
return [
	'name' => 'customers',
	'group' => [
        // permission customer ;
        [
            'name' => 'customer-view',
            'display_name' => trans('Xem danh sách khách hàng '),
        ],
        [
            'name' => 'customer-create',
            'display_name' => trans('Tạo khách hàng mới '),
        ],
        [
            'name' => 'customer-edit',
            'display_name' => trans('Cập nhật thông tin khách hàng '),
        ],
        [
            'name' => 'customer-delete',
            'display_name' => trans('Xóa khách hàng '),
        ],
    ]
];