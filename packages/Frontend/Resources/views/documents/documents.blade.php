@extends('frontend::documents.layouts.master')

@section('content')
<div id="docs" class="container-fullwidth clearfix">

	<div class="docs-navigation">
		<ul>
			@foreach($menus as $key => $val)
				@if($val->parent_id == 0)
				<li><a href="#{{ $val->data_href }}">{{ $val->title }}</a>
					@if(!empty($val->getChildMenu($val->id)))
					@foreach($val->getChildMenu($val->id) as $val)
					<ul class="one-page-menu" data-offset="110" data-easing="easeInOutExpo" data-speed="1250">
						<li><a href="#" data-href="#{{$val->data_href}}">{{$val->title}}</a></li>
					</ul>
					@endforeach
					@endif
				</li>
				@endif
			@endforeach
		</ul>
	</div>

	<div class="docs-content">
		@foreach($menus as $menu)
		@if($menu->parent_id == 0)
		<div id="{{ $menu->data_href }}">
			@if(!empty($menu->getChildMenu($menu->id)))
			@foreach($menu->getChildMenu($menu->id) as $child)
			<div id="{{$child->data_href}}" class="docs-content-inner page-section">
				<?php $document = $child->getDocument() ?>
				<h2>{{ $document->title }}</h2>
				<h5>{{ $document->description }}</h5>
				<br>
				<div class="doc-content">
					{!! $document->content !!}
				</div>
			</div>
			<div class="line"></div>
			@endforeach
			@endif
		</div>
		@endif
		@endforeach
	</div>
</div>
@endsection