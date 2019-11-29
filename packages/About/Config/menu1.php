<?php 

return [
	'name' => trans('Giới thiệu'),
	'route' => "",
	'sort' => 2,
	'active'=> 'about',
	'icon' => 'icon-speech',
	'middleware' => [],
	'group' => [
		'about_info' => [
			'name'  => trans('Về HCT'),
			'icon'  => null,
			'route' => route('admin.about.get.list'),
			'active'=> 'about_info',
			'middleware' => [],
		],
		\TTSoft\Media\Entities\Media::LOI_ICT_GIOI_THIEU => [
			'name'  => trans('Các lĩnh vực hoạt động'),
			'icon'  => null,
			'route' => route('admin.media.get.list.category',\TTSoft\Media\Entities\Media::LOI_ICT_GIOI_THIEU),
			'active'=> 'drive-to',
			'middleware' => [],
		],
	],
];