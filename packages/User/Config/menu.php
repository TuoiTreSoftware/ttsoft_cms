<?php 

return [
	'name' => trans('user::user.module_name'),
	'route' => '',
	'sort' => 23,
	'active' => 'user',
	'icon' => 'icon-user',
	'middleware' => ['permission:user-view'],
	'group' => [
		'users' => [
            'name'  => 'Users',
            'icon'  => null,
            'route' => route('users.index'),
            'active'=> 'users',
            'middleware' => ['permission:user-view'],
        ],
        'roles' => [
            'name'  => 'Roles',
            'icon'  => null,
            'route' => route('roles.index'),
            'active'=> 'roles',
            'middleware' => [],
        ],
	]
];