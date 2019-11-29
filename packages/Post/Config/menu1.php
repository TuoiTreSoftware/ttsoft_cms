<?php 

return [
	'name' => trans('post::post.module_name'),
	'route' => '',
	'sort' => 4,
	'active'=> 'post',
	'icon' => ' icon-note',
	'middleware' => [],
	'group' => [
		'posts' => [
            'name'  => trans('post::post.posts'),
            'icon'  => null,
            'route' => route('admin.post.get.list'),
            'active'=> 'posts',
            'middleware' => [],
        ],
        'categories' => [
            'name'  => trans('post::post.categories'),
            'icon'  => null,
            'route' => route('admin.post-categories.get.list'),
            'active'=> 'categories',
            'middleware' => [],
        ],
        'tags' => [
            'name'  => trans('post::post.tags'),
            'icon'  => null,
            'route' => route('admin.post-tags.get.list'),
            'active'=> 'tags',
            'middleware' => [],
        ]
	]
];