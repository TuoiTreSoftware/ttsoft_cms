<?php 
return [
	'name' => 'User',
	'group' => [
        [
            'name' => 'user-view',
            'display_name' => trans('Danh sách người dùng'),
        ],
        [
            'name' => 'user-create',
            'display_name' => trans('Tạo người dùng'),
        ],
        [
            'name' => 'user-edit',
            'display_name' => trans('Cập nhật người dùng'),
        ],
        [
            'name' => 'user-delete',
            'display_name' => trans('Xóa người dùng'),
        ],
        //Phân quyền
        [
            'name' => 'role-view',
            'display_name' => trans('Danh sách quyền'),
        ],
        [
            'name' => 'role-create',
            'display_name' => trans('Tạo quyền mới'),
        ],
        [
            'name' => 'role-edit',
            'display_name' => trans('Cập nhật quyền'),
        ],
        [
            'name' => 'role-delete',
            'display_name' => trans('Xóa quyền'),
        ],
    ]
];