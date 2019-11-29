<?php 

return [
	'name' => trans('home::home.module_name'),
	'route' => "",
	'sort' => 1,
	'active'=> 'home',
	'icon' => 'icon-home',
	'middleware' => [],
	'group' => [
		'drive-to' => [
			'name'  => trans('Trang chủ'),
			'icon'  => null,
			'route' => route('admin.home.get.index'),
			'active'=> 'drive-to',
			'middleware' => [],
		],
		\TTSoft\Media\Entities\Media::WELCOME => [
			'name'  => trans('Lợi ích chúng tôi mang đến cho bạn'),
			'icon'  => null,
			'route' => route('admin.media.get.list.category',\TTSoft\Media\Entities\Media::WELCOME),
			'active'=> 'drive-to',
			'middleware' => [],
		],
	],
];