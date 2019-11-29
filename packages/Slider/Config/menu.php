<?php 

return [
	'name' => trans('Slider'),
	'route' => '',
	'sort' => 22,
	'active' => 'slider',
	'icon' => 'fa fa-sliders',
	'middleware' => [],
	'group' => [
        'home-slider' => [
            'name'  => trans('Home Slider'),
            'icon'  => null,
            'route' => route('admin.slider.get.list',\TTSoft\Slider\Entities\Slider::CATEGORY_HOME),
            'active'=> 'home-slider',
            'middleware' => [],
        ]
	]
];