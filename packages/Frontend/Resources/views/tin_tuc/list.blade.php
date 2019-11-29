@extends('frontend::layouts.master')

@section('content')

<section id="page-title">

	<div class="container clearfix">
		<h1>{{ web_config('site_name') }}</h1>
		<span>Tin tức mới nhất về VIKEN SPORTS VIET NAM</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">
				<a href={{ route('frontend.tintuc.get') }}>{{ getCategoryPost($alias) }}</a>
			</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<section id="content">

	<div class="content-wrap">

		<div class="container notopmargin clearfix">

			@if($posts)
			{{--  postcontent    --}}
			<div class=" nobottommargin col_last clearfix">

				<!-- Posts ============================================= -->
				<div id="posts" class="post-grid grid-container grid-4 col-last clearfix">
					@foreach($posts as $key => $post)

					<div class="entry clearfix">
						<div class="entry-image">
							<a href="{{ $post->getRoute() }}"><img class="image_fade" src={{ $post->getImage() }} alt="{{ $post->getName() }}"></a>
						</div>
						<div class="entry-c">
							<div class="entry-title">
								<h2><a href={{ $post->getRoute() }}>{{ $post->getName() }}</a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> {{ $post->getCreatedAt() }}</li>
							</ul>
							<div class="entry-content hct-post-content" style="margin-top:15px">
								<p style="margin-top:5px; margin-bottom: 5px;">{!! $post->getDescription() !!}</p>
								<a href={{ $post->getRoute() }} class="more-link">Xem thêm ></a>
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- #posts end -->

				<!-- Pagination	============================================= -->
				<div class="row mb-3">
					<div class="col-12">
						{{ get_post()->links('vendor.pagination.bootstrap-frontend') }}
					</div>
				</div>
				<!-- .pager end -->

			</div><!-- .postcontent end -->
			@endif

			{{-- Sidebar=============================================
			@include('frontend::layouts.blog_sidebar') --}}

		</div>

	</div>

</section><!-- #content end -->

@endsection