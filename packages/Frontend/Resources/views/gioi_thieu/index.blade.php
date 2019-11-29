@extends('frontend::layouts.master')

@section('content')

@include ('frontend::gioi_thieu.slider')

<section id="content" class="courses">

	<div class="content-wrap nobottompadding" style="z-index: 1;">
		<div class="container topmargin">
			<div class="row">
				<div class="col-md-5">
					<div class="heading-block noborder">
						<h3>{{ get_of_hct('title') ?? 'VỀ CHÚNG TÔI'}}</h3>
					</div>
					<p>{!! get_of_hct('slogan') ?? 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.' !!}</p>
					<a href="{{ route('frontend.lienhe.get') }}" class="btn btn-primary">{{ trans('frontend::frontend.contactus') }}</a>
				</div>
				<div class="col-md-7">
					<iframe width="560" height="315" src="{{ get_of_hct('video') ?? 'https://www.youtube.com/embed/uI-_7eDbv_Q?autoplay=1&loop=1&playlist=uI-_7eDbv_Q' }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			
		</div>
		@if(get_of_hct('multi_image'))
		<div class="container-fluid topmargin clearfix">
			<div class="row clearfix">
				<div class="container">
					<div class="row clearfix">
						@foreach(get_of_hct('multi_image') as $d)
						<div class="col-md-4 bottommargin-sm">
							<div class="feature-box media-box fbox-bg">
								<div class="fbox-desc center" style="background-color: #f0f0f0 !important;">
									<img class="image_fade" width="60px" src="{{ substr($d->icon, 1) }}" alt="Featured Box Image"></a>
									<h3 class="nott ls0 t600 center">{{ $d->title }}</h3>
									<p>{{ $d->content }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		@endif
		
	</div>

</div>

</section><!-- #content end -->

@endsection