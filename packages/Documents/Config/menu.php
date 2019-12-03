<?php 

return [
	'name' => 'Documents',
	'route' => '',
	'sort' => 4,
	'active'=> 'documents',
	'icon' => ' icon-note',
	'middleware' => [],
	'group' => [
        'version' => [
            'name'  => 'Version',
            'icon'  => null,
            'route' => route('get.create.document_version'),
            'active'=> 'version',
            'middleware' => [],
        ],
        'menu' => [
            'name'  => 'Menu',
            'icon'  => null,
            'route' => route('get.create.document_menu'),
            'active'=> 'menu',
            'middleware' => [],
        ],
        'documents-list' => [
            'name'  => 'Documents',
            'icon'  => null,
            'route' => route('get.list.document'),
            'active'=> 'documents-list',
            'middleware' => [],
        ],
    ]
];