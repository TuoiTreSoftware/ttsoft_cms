<div class="docs-navigation">
	<ul>
		@if(get_menu_nav('document_sidebar'))
		@foreach(get_menu_nav('document_sidebar') as $val)
		<li><a href="#">{{ $val->title }}</a>
			<ul class="one-page-menu">
				@if(get_menu_nav('document_sidebar', $val->id))
				@foreach(get_menu_nav('document_sidebar', $val->id) as $child)
				<li><a href="#">{{ $child->title }}</a></li>
				@endforeach
				@endif
			</ul>
		</li>
		@endforeach
		@endif
	</ul>
</div>