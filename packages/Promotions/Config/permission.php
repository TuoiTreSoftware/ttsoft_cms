<?php 
return [
	'name' => 'promotion',
	'group' => [
        // permission promotion ;
        [
            'name' => 'promotion-view',
            'display_name' => trans('Xem danh sách khuyến mãi'),
        ],
        [
            'name' => 'promotion-create',
            'display_name' => trans('Tạo chương trình khuyến mãi '),
        ],
        [
            'name' => 'promotion-edit',
            'display_name' => trans('Cập nhật chương trình khuyến mãi '),
        ],
        [
            'name' => 'promotion-delete',
            'display_name' => trans('Xóa chương trình khuyến mãi '),
        ],
    ]
];