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